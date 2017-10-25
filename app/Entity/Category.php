<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    protected $fillable = [
        'id', 'name', 'preview', 'parent_id'
    ];
}
