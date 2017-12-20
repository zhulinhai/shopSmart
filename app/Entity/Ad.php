<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $table = 'ads';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'preview', 'url', 'type', 'published_date', 'end_date'
    ];

    protected $dates = ['published_date', 'end_date'];
}
