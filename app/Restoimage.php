<?php

namespace App;
use App\Restodata;
use App\ApiRestoModel;
use Illuminate\Database\Eloquent\Model;

class Restoimage extends Model
{

    protected $table = 'restoimages';
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * restoimage dimiliki oleh satu restodata
     */
    public function restodata() {
        return $this->belongsTo('App\Restodata');
    }

    public function api_resto() {
        //$api =  $this->hasMany('App\ApiRestoModel');
        return $this->belongsTo('App\Apirestomodel'); //->with($api);
    }
}
