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
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Row;
use DB;


class OrdersImport implements OnEachRow,WithStartRow,WithValidation,WithProgressBar
{
    use Importable;
	/**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    private $rows = 0;

    public function onRow(Row $row)
    {
        ++$this->rows;
        $row = $row->toArray();
        DB::beginTransaction();
        try {
            $order = Order::query()->firstOrCreate(
                ['name' => $row[0]],
    
                [
                    'name' => $row[0],
                    'total_price'     => $row[1],
                ]
            );
            DB::commit();
        } catch (Exceptions $e) {
            DB::rollBack();
            Log::debug($e);
        }
    }
    public function getRowCount(): int
    {
        return $this->rows;
    }
    public function startRow(): int
    {
        return 2;
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
