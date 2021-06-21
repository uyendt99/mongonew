<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'roles';

    public function users()
    {
        return $this->belongsToMany(User::class,null, 'role_ids','user_ids');
    }

    public function permissions()
    {
        return $this->belongsToMany(User::class,null, 'role_ids','permission_ids');
    }
}
