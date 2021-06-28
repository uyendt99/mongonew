<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Http\Requests\PermissionRequest;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $permissions = Permission::orderBy('created_at', 'desc')->paginate(5);
        return view('pages.permission.index',compact('permissions'));
    }

    public function create()
    {
        return view('pages.permission.create');
    }

    public function store(Request $request)
    {
        $permission = new Permission();
        $permission->name = $request->get('name');
        $permission->display_name = $request->get('display_name');
        $permission->save();
        return redirect('/permission')->with('success','Thêm quyền thành công');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('pages.permission.update',compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $permission->name = $request->get('name');
        $permission->display_name = $request->get('display_name');
        $role->update();
        
        return redirect('/permission')->with('success',"Cập nhật thông tin quyền thành công");
    }

    public function destroy($id)
    {
        $permission = Permission::destroy($id);
        return redirect('/permission')->with('success',"Xóa quyền thành công");
    }
}
