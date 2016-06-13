<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dataresto extends Model
{
    protected $fillable = [
        'nama_resto',
        'alamat',
        'no_telepon'
    ];
}
