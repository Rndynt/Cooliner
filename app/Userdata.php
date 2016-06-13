<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdata extends Model
{
    protected $fillable = [
        'username',
        'password',
        'firstname',
        'lastname',
        'email',
        'profile_photo'
        ];
}
