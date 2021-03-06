@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 1])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 编辑广告</a><a href="{{ url('/admin/ads') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::model($ad,['method'=>'PATCH','url' => '/admin/ads/'.$ad->id, 'enctype' => 'multipart/form-data']) }}
            @include('admin.ads.form')
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection
