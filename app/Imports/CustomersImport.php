<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use App\Models\User;
use App\Models\Order;
use App\Models\Company;
use App\Rules\CommaSeparated;

class CustomersImport implements ToModel,WithStartRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $company = Company::where('name','like',$row['5'])->get()->toArray();
        foreach($company as $com){
            $company_id = $com['_id'];
        }
        $user_name = explode(',',$row[7]);
        $order_name = explode(',', $row[8]);
        $array_orderId = [];
        $array_userId = [];
        foreach($user_name as $name){
            $user = User::where('name','like', $name)->get()->toArray();
            foreach($user as $u){
                $userId = $u['_id'];
                array_push($array_userId,$userId);
            }
        }
        foreach($order_name as $name){
            $order = Order::where('name','like', $name)->get()->toArray();
            foreach($order as $or){
                $orderId = $or['_id'];
                array_push($array_orderId,$orderId);
            }
        }
        $customer = new Customer([
            'name'     => $row[0],
            'age'    => $row[1],
            'gender'    => $row[2],
            'address'     => $row[3],
            'classify'    => explode(',',$row[4]),
            'company_id'    => $company_id,
            'job'    => $row[6],
            'user_ids' => $array_userId,
            'order_ids' => $array_orderId
        ]);
        $customer->save();
        $customer->users()->attach($array_userId);
        $customer->orders()->attach($array_orderId);
        return $customer;
    }
    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            '*.0' => ['required', "min:3", "max:100"],
            '*.1'          => ['required','numeric'],
            '*.2' => ['required'],
            '*.3' => ['required'],
            '*.4' => ['required'],
            '*.5' => ['required'],
            '*.6' => ['required'],
            '*.7' => ['required'],
            '*.8' => ['required']
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => "Cột tên khách hàng không được để trống",
            '1.reuqired'   => "Cột tuổi khách hàng không được để trống",
            '1.numeric' => "Cột tuổi phải nhập số",
            '2.required' => "Cột giới tính khách hàng không được để trống",
            '3.reuqired'   => "Cột địa chỉ khách hàng không được để trống",
            '4.required' => "Cột phân loại khách hàng không được để trống",
            '5.reuqired'   => "Cột nơi làm việc khách hàng không được để trống",
            '6.required' => "Cột nghề nghiệp khách hàng không được để trống",
            '7.reuqired'   => "Cột nhân viên chăm sóc khách hàng không được để trống",
        ];
    }
}
