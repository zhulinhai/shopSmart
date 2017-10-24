<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'nick_name', 'head_image', 'sex', 'phone', 'level', 'score', 'locked', 'deviceType', 'birthday', 'last_login_time', 'created_at'
    ];
    protected $hidden = ['password'];
}
