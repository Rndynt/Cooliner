<?php

namespace App;
use App\User;
use App\Restoimage;
use Illuminate\Database\Eloquent\Model;

class Restodata extends Model
{
    protected $fillable = [
        'resto_name',
        'profile_photo',
        'description',
        'address',
        'phone',
        'likes',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];


//    public function user() {
//        return $this->hasOne('User', 'id');
//    }

    /**
     * Restodata dimiliki oleh satu User
     */
    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Restodata memiliki banyak Restoimage
     */
    public function restoimage() {
        return $this->hasMany('App\Restoimage', 'resto_id');
    }

    /**
     * Restodata memiliki banyak Restomenu
     */
    public function restomenu() {
        return $this->hasMany('App\Restomenu', 'resto_id');
    }

    public function booking() {
        return $this->hasMany('App\Booking', 'resto_id');
    }

}
