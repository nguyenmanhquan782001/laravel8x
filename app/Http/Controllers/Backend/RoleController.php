<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $data = [];
        $data['roles'] = $roles;
        return view("backend.role.index", $data);
    }
    public function create()
    {
        $permissions = Permission::where("parent_id", 0)->get();
        return view("backend.role.create", compact('permissions'));
    }
    public function store(Request $request)
    {
        $ruler = [
            'name' => "required|unique:roles,name",
        ];
        $message = [
            'name.required' => "Yêu cầu có role"
        ];
        $validator = Validator::make($request->all(), $ruler, $message);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $role = new Role();
        $role->guard_name = "web";
        $role->name = $request->name;
        $role->desc_role = $request->desc_role;

        $role->save();
        $roleId = $role->id;
        $roleFind = Role::find($roleId);
        $roleFind->syncPermissions($request->permission_id);
        return redirect()->route('role.index')->with("success", "Tạo role thành công");
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::where("parent_id", 0)->get();
        $data = [];
        $data['role'] = $role;
        $data['permissions'] = $permissions;
        return view("backend.role.edit", $data);
    }
    public function update(Request $request, $id)
    {
        $ruler = [
            'name' => "required|unique:roles,name,$id,id"
        ];
        $message = [
            "name.required" => "Không để trống đề mục này",
            'name.unique' => "Role đã tồn tại"
        ];
        $validator = Validator::make($request->all(), $ruler, $message);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $role = Role::find($id);
        $role->update([
            'name' => $request->name ,
           'desc_role' => $request->desc_role,
       ]);
        if ($request->has('permission_id')) {
            $role->syncPermissions($request->permission_id);
        }
        return  redirect()->route("role.index")->with("success", "Sửa role thành công");
    }
    public  function  delete($id) {
        $role = Role::find($id) ;
        $role->delete() ;
        return response()->json([
            'code' => '200',
            'message' => 'success'
        ], 200);

    }
}
