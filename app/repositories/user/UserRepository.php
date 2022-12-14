<?php

namespace App\repositories\user;

use App\Models\Role;
use App\Models\Role_user;
use App\Models\User;
use App\repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

    public function getUser()
    {
        return $this->model->search()->orderByDesc('id')->paginate(5);
    }
    public function getRole()
    {
        return Role::all();
    }

    public function store($request)
    {

        try {
            $linkImage = '';
            DB::beginTransaction();
            $users = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
            ];

            if ($request->hasFile('path_image')) {
                upload_img('users', $request);
                $linkImage = $request->input('path_image');
                $users['path_image'] = $linkImage;
            }
           $user =  $this->create($users);

            if (!empty($request->roles)){
                $user->roles()->attach($request->roles);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Tạo mới tài khoản thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            File::delete(public_path($linkImage));
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            return redirect()->back()->with('error', 'Tạo mới tài khoản thất bại');
        }
    }

    public function edit($id,$request)
    {
        try {
            $linkImage = '';
            $user = $this->model->find($id);
            $linkOldImage = $user->path_image;
            DB::beginTransaction();
            $userUpdate = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address
            ];
            if ($request->hasFile('path_image')) {
                upload_img('users', $request);
                $linkImage = $request->input('path_image');
                $userUpdate['path_image'] = $linkImage;
            }
            $user->update($userUpdate);
             $user->roles()->sync($request->roles);
            DB::commit();
            if ($request->hasFile('path_image')) {
                File::delete(public_path($linkOldImage));
            }
            return redirect()->back()->with('success', 'Sửa tài khoản thành công');
        } catch (\Exception $err) {
            DB::rollBack();
            File::delete(public_path($linkImage));
            Log::error('Message' . $err->getMessage() . 'Line :' . $err->getLine());
            return redirect()->back()->with('error', 'Sửa tài khoản thất bại');
        }

    }
}
