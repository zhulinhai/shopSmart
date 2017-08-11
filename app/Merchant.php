<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'head_image', 'logo', 'address', 'tel', 'types', 'updated_at'
    ];

    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
