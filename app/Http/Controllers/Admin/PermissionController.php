<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PermissionController extends Controller
{
    protected $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission->where('parent_id', 0)->paginate(1);
        return view('admin.permission.index',[
            'model' => 'permission',
            'title' => 'permission',
            'permissions'=>$permissions
        ]);
    }

    public function create()
    {

        return view('admin.permission.add', [
            'model' => 'permission',
            'title' => 'permission'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions'
        ]);
        try {
            $permissionId = $this->permission->insertGetId([
                'name' => $request->name,
                'parent_id' => 0
            ]);
            foreach ($request->module_child as $value) {
                $this->permission->create([
                    'name' => $value,
                    'key_code' => $value,
                    'parent_id' => $permissionId
                ]);
            }
            return redirect()->back()->with('success', 'Tạo Mới Thành Công');
        } catch (\Exception $err) {

        }

    }

    public function edit($id, Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
