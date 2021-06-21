<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {

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
