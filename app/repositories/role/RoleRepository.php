<?php

namespace App\repositories\role;

use App\Models\Permission;
use App\Models\Role;
use App\repositories\BaseRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPUnit\Exception;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{


    public function getModel(): string
    {
        return Role::class;
    }

    public function getRole()
    {
        return $this->model->orderByDesc('created_at')->paginate(5);
    }

    public function getPermission()
    {
        return Permission::where('parent_id', 0)->get();
    }

    public function store($request)
    {
        try {
            $request->validate([
                'name'=>'required'
            ],[
                'name.required'=>'Không được để trống Name'
            ]);
        DB::beginTransaction();
            $role = [
                'name'=>$request->name,
                'display_name'=>$request->display_name
            ];
           $roleId =  $this->create($role);
           $roleId->permissions()->attach($request->permission_id);
           DB::commit();
           return redirect()->back()->with('success', 'Thêm mới Thành công');
        }catch(Exception $err){
        DB::rollBack();
        Log::error('Messages :' . $err->getMessage() . 'Line :'. $err->getLine());
            return redirect()->back()->with('error', 'Thêm mới Thất Bại');
        }
    }

    public function edit($id,$request)
    {
        try {
            $request->validate([
                'name'=>'required'
            ],[
                'name.required'=>'Không được để trống Name'
            ]);
            DB::beginTransaction();
            $role = $this->find($id);
            $roleUpdate = [
                'name'=>$request->name,
                'display_name'=>$request->display_name
            ];
            $role->update($roleUpdate);
            $role->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->back()->with('success', 'Sửa Thành công');
        }catch(Exception $err){
            DB::rollBack();
            Log::error('Messages :' . $err->getMessage() . 'Line :'. $err->getLine());
            return redirect()->back()->with('error', 'Sửa Thất Bại');
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $role = $this->find($id);
            $role->delete();
            $role->permissions()->detach();
            DB::commit();
            return redirect()->back()->with('success', 'Xóa Thành công');
        }catch(\Exception $err){
            DB::rollBack();
            Log::error('Messages :' . $err->getMessage() . 'Line :'. $err->getLine());
            return redirect()->back()->with('error', 'Xóa Thất Bại');
        }
    }
}
