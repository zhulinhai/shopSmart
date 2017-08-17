@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 1])
@endsection

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 商家管理</a><a href="{{ url('/merchants') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-exclamation-sign
"></i> 取消</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::model($merchant, ['method'=>'PATCH','url' => 'merchants/edit/'.$merchant->id]) }}
            @include('admin.merchants.form')
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection
