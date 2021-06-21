<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view('pages.role.index');
    }

    public function create()
    {
       return view('pages.role.create');
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->get('name');
        $role->save();
        return redirect('/role')->with('success','Thêm vai trò thành công');
    }
}
