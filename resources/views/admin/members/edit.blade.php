@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 5])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 会员创建</a><a href="{{ url('/admin/members') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::model($member, ['method'=>'PATCH', 'url' => '/admin/members/'.$member->id]) }}
                @include('admin.members.form')
                <div class="form-group" style="margin-top: 10px">
                    {!! Form::submit('更新',['class'=>'form-control btn-primary']) !!}
                </div>
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection