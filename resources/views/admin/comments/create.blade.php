<@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 5])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 添加评论</a><a href="{{ url('/comments') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::open(array('url' => '/comments/store')) }}
                <div class="form-group">
                    {!! Form::label('post', '文章', ['class'=>'control-label']) !!}
                    {!! Form::select('post', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', '内容', ['class'=>'control-label']) !!}
                    {!! Form::text('content', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group" style="margin-top: 10px">
                    {!! Form::submit('提交评论', ['class'=>'form-control btn-primary']) !!}
                </div>
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection