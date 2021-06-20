<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use App\Model\Company;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CustomersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        DB::connection()->enableQueryLog();
        $customers = Customer::with('company','orders','users')->get();
        $queries = DB::getQueryLog();
        // dd($queries);
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
        ];
    }
}
