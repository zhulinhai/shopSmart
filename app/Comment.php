<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'message_id', 'message_user_id', 'user_id', 'type', 'content'
    ];

    /**
     * 获取评论对应的博客文章
     */
    public function Article()
    {
        return $this->belongsTo('App\Article');
    }
}
