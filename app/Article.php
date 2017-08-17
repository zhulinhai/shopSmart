<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'summary', 'head_image', 'user_id', 'published_at'];

    public function user()
    {
        return $this->belongsTo('User');
    }

    /**
     * 获取博客文章的评论
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
