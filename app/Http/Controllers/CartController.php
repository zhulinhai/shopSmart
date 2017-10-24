<?php

namespace App\Http\Controllers;

use App\Entity\Cart;
use App\Entity\CartItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addItem($actId)
    {
        $cart = Cart::where('member_id', Auth::member()->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->member_id = Auth::member()->id;
            $cart->save();
        }

        $cartItem = new CartItem();
        $cartItem->act_id = $actId;
        $cartItem->cart_id = $cart->id;
        $cartItem->save();

        return redirect('/cart');
    }

    public function showCart()
    {
        $cart = Cart::where('member_id', Auth::member()->id)->first();

        if (!$cart) {
            $cart = new Cart();
            $cart->member_id = Auth::user()->id;
            $cart->save();
        }

        $items = $cart->cartItems;
        $total = 0;
        foreach ($items as $item) {
            $total += $item->product->price;
        }

        return view('cart.view', ['items'=>$items, 'total'=>$total]);
    }

    public function removeItem($id)
    {
        CartItem::destroy($id);
        return redirect('/cart');
    }

}
