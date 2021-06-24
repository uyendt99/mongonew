<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'username'  => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role_ids' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.string' => 'Tên phải là chuỗi ký tự chữ',
            'username.required' => 'Vui lòng nhập tên đăng nhập',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Định dạng email không đúng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải dài hơn 6 ký tự',
            'role_ids.required' => 'Vui lòng chọn vai trò',
        ];
    }
}
