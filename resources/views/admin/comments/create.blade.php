@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 4])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 添加评论</a><a href="{{ url('/admin/comments') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::open(array('url' => '/admin/comments/store')) }}
                <div class="form-group">
                    {!! Form::text('member_id',  1, ['class'=>'form-control', ]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('article_id', '评论文章', ['class'=>'control-label']) !!}
                    {!! Form::select('article_id', $articles, 0, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('content', '评论内容', ['class'=>'control-label']) !!}
                    {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group" style="margin-top: 10px">
                    {!! Form::submit('提交评论', ['class'=>'form-control btn-primary']) !!}
                </div>
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection