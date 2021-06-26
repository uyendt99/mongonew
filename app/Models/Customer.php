<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Customer extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection  = 'customers';

    protected $fillable = [
        'name','age','gender','address','classify','company_id','job','user_ids','order_ids'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class,null,'customer_ids','order_ids');
    }

    public function users()
    {
        return $this->belongsToMany(User::class,null, 'customer_ids','user_ids');
    }
}