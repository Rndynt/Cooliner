<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $fillable = [
        'id_user',
        'id_resto',
        'status'
    ];

    public function restodata() {
        return $this->belongsTo('App\Restodata');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function bookingdetail() {
        return $this->hasMany('App\Bookingdetail', 'id_booking');
    }

    public function restomenu()
    {
        return $this->belongsToMany('App\Restomenu', 'bookingdetails','id_booking', 'id_menu');
    }


}
