<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Company extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection   = 'companies';
    
    protected $fillable = [
        'name'
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class,'company_id');
    }
}
