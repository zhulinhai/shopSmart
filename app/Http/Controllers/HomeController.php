<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Act;
use App\Merchant;
use App\Member;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $act_count =  Act::all()->count();
        $merchant_count =  Merchant::all()->count();
        $article_count =  Article::all()->count();
        $member_count =  Member::all()->count();
        $comment_count =  Comment::all()->count();
        $counts = array(
            'act'=>$act_count,
            'merchant'=>$merchant_count,
            'article'=>$article_count,
            'member'=>$member_count,
            'comment'=>$comment_count
        );
        return view('home', ['counts'=>$counts]);
    }
}
