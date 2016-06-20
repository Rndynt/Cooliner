<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restomenu extends Model
{
    protected $table = 'restomenus';
    protected $fillable = [
        'resto_id',
        'name',
        'price',
        'url',
        'category_id'
    ];

    public function restodata() {
        return $this->belongsTo('App\Restodata');
    }

//    public function bookingdetail() {
//        return $this->belongsTo('App\Bookingdetail');
//    }

    public function booking() {
        return $this->belongsToMany('App\Booking', 'bookingdetails','id_menu', 'id_booking');
    }


}
