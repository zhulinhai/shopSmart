<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entity\Order;
use App\Entity\M3Result;

class OrdersController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(10);
        return view('admin.orders', ['orders' => $orders]);
    }

    public function toOrderEdit(Request $request)
    {
        $order = Order::find($request->input('id', ''));
        return view('admin.order_edit')->with('order', $order);
    }

    public function orderEdit(Request $request)
    {
        $order = Order::find($request->input('id', ''));
        $order->status = $request->input('status', 1);
        $order->save();

        $m3_result = new M3Result;
        $m3_result->status = 0;
        $m3_result->message = '添加成功';

        return $m3_result->toJson();
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id)->first();
        return view('admin.orders.edit',['order'=>$order]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return redirect('/admin/orders');
    }

}
