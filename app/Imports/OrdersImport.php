<?php

namespace App\Imports;

use App\Models\Order;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use Maatwebsite\Excel\Events\AfterImport;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithProgressBar;


class OrdersImport implements ToModel,WithStartRow,WithValidation,WithProgressBar
{
    use Importable;
	/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'name'     => $row[0],
            'total_price'    => $row[1],
        ]);
    }
    public function startRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.0' => 'required|string',
            '*.1' => 'required|numeric',
        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function customValidationMessages()
    {
        return [
            '0.required' => "Tên đơn hàng không được để trống",
            '0.string'   => "Tên đơn hàng là chuỗi ký tự",
            '1.required' => "Cột tổng tiền không được để trống",
            '1.numeric' => "Giá trị cột tổng tiền phải là ký tự số"
        ];
    }
}
