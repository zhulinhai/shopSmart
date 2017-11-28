<?php

namespace App\Http\Controllers;

use App\Entity\Article;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\Merchant;
use App\Entity\Member;
use App\Entity\Comment;

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
        $product_count =  Product::all()->count();
        $merchant_count =  Merchant::all()->count();
        $article_count =  Article::all()->count();
        $member_count =  Member::all()->count();
        $comment_count =  Comment::all()->count();
        $order_count =  Order::all()->count();
        $counts = array(
            'product'=>$product_count,
            'merchant'=>$merchant_count,
            'article'=>$article_count,
            'member'=>$member_count,
            'comment'=>$comment_count,
            'order'=>$order_count,
        );
        return view('admin.home', ['counts'=>$counts]);
    }
}
