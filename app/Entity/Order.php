<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    protected $fillable = [
        'id', 'order_no', 'name', 'total_price', 'payway', 'status'
    ];
}