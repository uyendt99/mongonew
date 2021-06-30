<?php

namespace App\Exports;

use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $idsArr;
    public function collection()
    {   
        
        if(isset($idsArr)){
            $customers = Customer::with('company')->whereIn('_id', $idsArr)->get();
            dd($customers);
        }else{
            $customers = Customer::with('company')->get();
        }
        
        $data = [];
        foreach ($customers as $customer) {
            $data[] = [
                $customer->name,
                $customer->age,
                $customer->gender,
                $customer->address,
                implode(',', $customer->classify),
                $customer->company->name,
                $customer->job,
                implode(',', $customer->users->pluck('name')->toArray()),
                implode(',', $customer->orders->pluck('name')->toArray()),

            ];
        }
        return collect($data);
    }
    public function headings(): array
    {
        return [
            "Tên",
            "Tuổi",
            "Giới tính",
            "Địa chỉ",
            "Phân loại",
            "Nơi làm việc",
            "Nghề nghiệp",
            "Nhân viên chăm sóc",
            "Đơn hàng"
        ];
    }
}
