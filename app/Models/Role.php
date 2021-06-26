<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Role extends Eloquent
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection  = 'roles';

    public function users()
    {
        return $this->belongsToMany(User::class,null, 'role_ids','user_ids');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class,null, 'role_ids','permission_ids');
    }
}
