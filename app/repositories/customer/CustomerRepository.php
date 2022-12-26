<?php

namespace App\repositories\customer;

use App\Models\Customer;
use App\repositories\BaseRepository;
use App\repositories\customer\CustomerRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{

    public function getModel()
    {
        return Customer::class;
    }

    public function getCustomer()
    {
        return $this->model->search()->orderByDesc('id')->paginate(5);
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
