<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Order extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'orders';

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'order_ids');
    }

}
