<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Permission extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection  = 'permissions';

    public function roles()
    {
        return $this->belongsToMany(Role::class,null, 'permission_ids','role_ids');
    }
}
