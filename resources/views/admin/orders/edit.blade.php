@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 7])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 编辑订单</a><a href="{{ url('/admin/orders') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::model( $order,['method'=>'PATCH','url' => '/admin/orders/'.$order->id]) }}

                <div class="form-group">
                    {!! Form::label('order_no', '订单号码', ['class'=>'control-label']) !!}
                    {!! Form::text('order_no', $order->order_no, ['class'=>'form-control','readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('order_name', '订单名称', ['class'=>'control-label']) !!}
                    {!! Form::text('order_name', $order->name, ['class'=>'form-control','readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('total_price', '总金额', ['class'=>'control-label']) !!}
                    {!! Form::text('total_price', $order->total_price, ['class'=>'form-control','readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('payway', '支付方式', ['class'=>'control-label']) !!}
                    {!! Form::select('payway', array('1'=>'支付宝', '2'=>'微信', '3'=>'其他'), $order->payway, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', '订单状态', ['class'=>'control-label']) !!}
                    {!! Form::select('status', array('1'=>'未支付', '2'=>'已支付', '3'=>'等待发货', '4'=>'已发货', '5'=>'已签收'), $order->status, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('提交',['class'=>'btn btn-primary form-control']) !!}
                </div>

            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection
