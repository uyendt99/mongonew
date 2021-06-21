<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('pages.user.index',compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('pages.user.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $role_ids = $request->get('role_ids');
        $user = new User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();
        $user->roles()->attach($role_ids);

        return redirect('/user')->with('success','Thêm tài khoản thành công');
    }
}
