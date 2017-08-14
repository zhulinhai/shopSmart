<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'content', 'privilege', 'head_image', 'images', 'start_date', 'end_date', 'merchant_id', 'sale_count', 'status', 'updated_at'
    ];
}
