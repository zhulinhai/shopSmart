<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchant';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'logoFile', 'headFile', 'address', 'tel', 'category_id', 'published_at'
    ];
    protected $dates = [ 'published_at'];

}
