<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Permission;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permissions)
    {
        if (!Auth::check())
        return redirect('/login');
        $array_permission = [];
        foreach(Auth::user()->roles as $role){
            foreach($role->permissions as $per){
                array_push($array_permission, $per->name);
            }
        }
        if (in_array($permissions, $array_permission)){
            return $next($request);
        }else{
            $permission = Permission::where('name',$permissions)->first()->toArray();
            $display_name_per = $permission['display_name'];
            return redirect('/error')->withMessage('Bạn không có quyền '.$display_name_per);
        }


    }
}
