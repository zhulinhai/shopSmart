<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use App\Entity\Comment;
use App\Entity\M3Result;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $input = $request->all();
        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        $comment = new Comment();
        $comment->title = $input['title'];
        $comment->content = $input['content'];
        $comment->type = $input['type'];
        $comment->member_id = $input['member_id'];
        $comment->save();

        return $m3_result->toJson();
    }
}
