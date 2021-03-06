<?php

namespace App\Entity;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $table = 'article';
    protected $fillable = ['id','title', 'summary', 'head_image', 'user_id', 'category', 'published_at'];
    protected $dates =['published_at'];
    public static $rules = [
        'title'=>'required|min:3',
        'content'=>'required'
    ];

    public static $messages = [
        'title.required'=>'标题不能为空且至少3个字',
        'content.required'=>'内容不允许为空'
    ];

//    public function setPublishedAtAttribute($date)
//    {
//        $this->attributes['published_at']= Carbon::parse($date);
//    }
//
//    public function scopePublished($query)
//    {
//        $query->where('published_at', '<=', Carbon::now());
//    }

//    public function user()
//    {
//        return $this->belongsTo('App\Admin');
//    }

    /**
     * 获取博客文章的评论
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * 增加评论
     **/
    public function addComment($content)
    {
        $this->comments()->create(compact('content', $content));
    }
}
