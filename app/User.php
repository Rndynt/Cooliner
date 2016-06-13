<?php

namespace App;


use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Restodata;
use App\Restoimage;
class User extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','admin',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
        'password', 'remember_token',
    ];

//    public function can($permission = null)
//    {
//        return !is_null($permission) && $this->checkPermission($permission);
//    }

//    protected function checkPermission($perm)
//    {
//        $permissions = $this->getAllPernissionsFormAllRoles();
//        $permissionsArray = is_array($perm) ? $perm : [$perm];
//        return count(array_intersect($permissions, $permissionsArray));
//    }
//
//    protected function getAllPernissionsFormAllRoles()
//    {
//        $permissionsArray = [];
//        $permissions = $this->roles->load('permissions')->fetch('permissions')->toArray();
//        return array_map('strtolower', array_unique(array_flatten(array_map(function($permission){
//            return array_fetch($permission, 'permission_slug');
//        }, $permissions ))));
//    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->withTimestamps();
    }

    public function assignRole($role)
    {
        if(is_string($role)){
            $role = Role::where('name', $role)->first();
        }
        return $this->roles()->attach($role);
    }

    public function revokeRole($role)
    {
        if(is_string($role)){
            $role= Role::where('name', $role)->first();
        }

        return $this->roles()->detach($role);
    }

    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

//    public function restoData() {
//        return $this->belongsTo('Restodata', 'id');
//    }

    public function restodata() {
        return $this->hasOne('App\Restodata');
    }

    public function restoimage()
    {
        return $this->hasManyThrough('App\Restoimage', 'App\Restodata', 'user_id','resto_id');
    }

    public function booking() {
        return $this->hasOne('App\Booking');
    }


}
