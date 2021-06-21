<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::all();
        $data = [];
        foreach ($orders as $order) {
            $data[] = [
                $order->name,
                $order->total_price,
            ];
        }
        return collect($data);
    }
    public function headings(): array
    {
        return [
            "Tên đơn hàng",
            "Tổng tiền",
        ];
    }
}
