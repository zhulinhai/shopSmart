<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'nickname', 'preview', 'sex', 'phone', 'active', 'device_type', 'birth_day', 'last_login_time'
    ];
    protected $hidden = ['password'];
    protected $dates = ['birthDay', 'last_login_time'];
}
