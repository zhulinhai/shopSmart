<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    public function cartItems()
    {
        return $this->hasMany('App\CartItem');
    }
}
