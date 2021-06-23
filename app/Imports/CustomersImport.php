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

class CustomersImport implements ToModel,WithStartRow
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
        //dd($user_name);
        $array_userId = [];
        foreach($user_name as $name){
            $user = User::where('name','like', $name)->get()->toArray();
            foreach($user as $u){
                $userId = $u['_id'];
                array_push($array_userId,$userId);
            }
        }
        dd($array_userId);
        

        $customer = new Customer([
            'name'     => $row[0],
            'age'    => $row[1],
            'gender'    => $row[2],
            'address'     => $row[3],
            'classify'    => explode(',',$row[4]),
            'company_id'    => $company_id,
            'job'    => $row[6],
            'user_ids' => $array_userId,
            'order_ids' => $row[8]
        ]);
        return $customer;
    }
    public function startRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.name' => ['required', "min:3", "max:100"],
            '*.age'          => ['required','number'],
            '*.address' => ['required', "min:3", "max:100"],
            '*.job' => ['required', "min:3", "max:100"],
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
