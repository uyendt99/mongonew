<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Customer extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'customers';

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }
}