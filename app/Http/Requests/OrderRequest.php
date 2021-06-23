<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'total_price' => 'required|numeric'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên đơn hàng',
            'name.string' => 'Tên phải là chuỗi ký tự chữ',
            'total_price.required' => 'Vui lòng nhập tổng giá tiền',
            'total_price.numeric' => 'Vui lòng nhập số'
        ];
    }
}
