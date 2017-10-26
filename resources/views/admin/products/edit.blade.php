@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 2])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 活动管理</a><a href="{{ url('/admin/products') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::model( $product,['method'=>'PATCH','url' => '/admin/products/'.$product->id]) }}
            @include('admin.products.form')
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection
