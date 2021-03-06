<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
            'age'  => 'required|min:1',
            'phone' => ['required', 'regex:/(09|03|07|08|05)[0-9]{8}/'],
            'email' => 'required|email',
            'gender' => 'required',
            'address' => 'required|string',
            'classify' => 'required',
            'company_id' => 'required',
            'job' => 'required',
            'user_ids' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên khách hàng',
            'name.string' => 'Tên khách hàng phải là chuỗi ký tự chữ',
            'age.required' => 'Vui lòng nhập tuổi',
            'age.number' => 'Vui lòng nhập số',
            'age.min' => 'Tuổi phải là một số lớn hơn 0',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại của bạn không đúng định dạng',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Định dạng email không đúng',
            'gender.required' => 'Vui lòng chọn giới tính',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'classify.required' => 'Vui lòng chọn loại khách hàng',
            'company_id.required' => 'Vui lòng chọn nơi làm việc',
            'job.required' => 'Vui lòng nhập nghề nghiệp',
            'user_ids.required' => 'Vui lòng chọn nhân viên chăm sóc'
        ];
    }
}
