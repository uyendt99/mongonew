<?php

namespace App\Imports;

use App\Customer;
use Maatwebsite\Excel\Concerns\ToModel;

class CustomersImport implements ToModel,WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'name'     => @$row['name'],
            'age'    => @$row['age'],
            'address'     => @$row['address'],
            'job'    => @$row['job'],
        ]);
    }
    public function startRow(): int
    {
        return 2;
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
