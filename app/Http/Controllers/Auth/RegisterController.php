<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        
        $allRequest  = $request->all();	
        $validator = $this->validator($allRequest);
    
        if ($validator->fails()) {
            // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('register')->withErrors($validator)->withInput();
        } else {   
            // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
            if( $this->create($allRequest)) {
                // Insert thành công sẽ hiển thị thông báo
                Session::flash('success', 'Đăng ký thành viên thành công!');
                return redirect('register');
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                Session::flash('error', 'Đăng ký thành viên thất bại!');
                return redirect('register');
            }
        }
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data,
            [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|required_with:cfm_password|same:cfm_password',
            ],
            [
                'name.required' => 'Họ và tên là trường bắt buộc',
                'name.max' => 'Họ và tên không quá 255 ký tự',
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'email.max' => 'Email không quá 255 ký tự',
                'email.unique' => 'Email đã tồn tại',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
                'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            ]
        );
    }
    
}
