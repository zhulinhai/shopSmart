<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['title', 'content', 'summary', 'head_image', 'user_id', 'published_at', 'tags'];
    protected $dates =['published_at'];

    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at']= Carbon::parse($date);
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * 获取博客文章的评论
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
