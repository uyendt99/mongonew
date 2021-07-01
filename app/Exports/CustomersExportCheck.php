<?php

namespace App\Exports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomersExportCheck implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $idsArr;

    public function __construct($idsArr)
    {
        $this->idsArr = $idsArr;
    }
    public function collection()
    {
        $ids = $this->idsArr;
        $customers = Customer::with('company')->whereIn('_id',$ids)->get();
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
