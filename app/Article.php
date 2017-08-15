<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends \Eloquent
{
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'resolved_content', 'user_id'];

    public function tags()
    {
        return $this->belongsToMany('ArticleTag');
    }

    public function user()
    {
        return $this->belongsTo('User');
    }
}
