@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 7])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 订单管理</a><a href="{{ url('/admin/orders/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 创建订单</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th class="col-xs-1">ID</th>
                            <th class="col-xs-1">订单号</th>
                            <th class="col-xs-2">订单名称</th>
                            <th class="col-xs-1">支付金额</th>
                            <th class="col-xs-1">支付方式</th>
                            <th class="col-xs-1">订单状态</th>
                            <th class="col-xs-1">用户ID</th>
                            <th class="col-xs-2">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{$order->id}}</td>
                                <td>{{$order->order_no}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->total_price}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>
                                    @if($order->payway == 1)
                                        支付宝
                                    @elseif($order->payway == 2)
                                        微信
                                    @else
                                        其他
                                    @endif
                                </td>
                                <td>
                                    @if($order->status == 1)
                                        <span class="label label-danger radius">未支付</span>
                                    @elseif($order->status == 2)
                                        <span class="label label-success radius">已支付</span>
                                    @elseif($order->status == 3)
                                        <span class="label label-success radius">等待发货</span>
                                    @elseif($order->status == 4)
                                        <span class="label label-success radius">已发货</span>
                                    @elseif($order->status == 5)
                                        <span class="label label-success radius">已签收</span>
                                    @endif</td>
                                </td>
                                <td>
                                    <a href="{{ url('/admin/orders/'.$product->id.'/edit') }}"><button class="btn btn-danger"><i class="glyphicon glyphicon-pencil"></i> 编辑</button></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
