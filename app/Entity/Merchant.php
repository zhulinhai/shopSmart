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
        'id', 'name', 'logoFile', 'headFile', 'address', 'tel', 'types', 'updated_at'
    ];

    public function file()
    {
        return $this->belongsTo('App\File');
    }
}
