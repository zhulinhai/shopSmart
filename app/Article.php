<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'published_at', 'user_id'];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
