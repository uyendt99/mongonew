<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::paginate(5);
        return view('pages.role.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
       return view('pages.role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $permission_ids = $request->get('permission_ids');
        $role = new Role();
        $role->name = $request->get('name');
        $role->save();
        $role->permissions()->attach($permission_ids);

        return redirect('/role')->with('success','Thêm vai trò thành công');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        return view('pages.role.update',compact('role','permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->name = $request->get('name');
        $role->permissions()->detach($role->permission_ids);
        $role->permissions()->attach($request->get('permission_ids'));
        $role->update();
        
        return redirect('/role')->with('success',"Cập nhật thông tin vai trò thành công");
    }
}
