<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';

    //public $timestamps = false;
    protected $fillable = ['name', 'summary', 'price', 'category_id', 'preview', 'count', 'sale_count', 'status', 'end_date', 'published_at'];

    protected $dates = ['end_date', 'published_at'];
}
