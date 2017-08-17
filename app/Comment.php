<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * 获取评论对应的博客文章
     */
    public function Article()
    {
        return $this->belongsTo('App\Article');
    }
}
