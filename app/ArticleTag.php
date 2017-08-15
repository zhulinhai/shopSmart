<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleTag extends \Eloquent
{
    use SoftDeletes;

    protected $fillable = ['name'];

    public function articles()
    {
        return $this->belongsToMany('Article');
    }
}
