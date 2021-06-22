<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $permissions = Permission::paginate(5);
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
        $permission->save();
        return redirect('/permission')->with('success','Thêm quyền thành công');
    }
}
