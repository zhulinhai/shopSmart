<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'nick_name', 'head_image', 'sex', 'level', 'score', 'password', 'deviceType', 'birthday', 'last_login_time', 'created_at'
    ];
}