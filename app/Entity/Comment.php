<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'article_comments';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'article_id', 'content'
    ];

    /**
     * 获取评论对应的博客文章
     */
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
