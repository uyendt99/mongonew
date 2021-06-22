<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

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

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('pages.user.update',compact('user','roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->roles()->detach($user->role_ids);
        $user->roles()->attach($request->get('role_ids'));
        $user->update();
        
        return redirect('/user')->with('success',"Cập nhật thông tin tài khoản thành công");
    }
}
