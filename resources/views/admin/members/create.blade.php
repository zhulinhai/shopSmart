@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 5])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 会员创建</a><a href="{{ url('/members') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::open(array('url' => 'members/store')) }}
            @include('admin.members.form')
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection
