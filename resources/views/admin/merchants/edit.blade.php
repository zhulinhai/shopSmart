@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 1])
@endsection

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 商家管理</a><a href="{{ url('/admin/merchants') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::model($merchant, ['method'=>'PATCH','url' => '/admin/merchants/'.$merchant->id]) }}
            @include('admin.merchants.form')
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection
