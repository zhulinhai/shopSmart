<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Entity\Member');
    }

    public function cartItems()
    {
        return $this->hasMany('App\Entity\CartItem');
    }
}
