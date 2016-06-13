<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookingdetail extends Model
{
    protected $fillable = [
        'id_booking',
        'id_menu',
    ];

    public function booking() {
        return $this->belongsTo('App\Booking');
    }

    public function restomenu() {

        return $this->hasMany('App\Restomenu','id');
    }
}
