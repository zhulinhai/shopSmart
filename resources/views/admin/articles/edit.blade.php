@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 3])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 编辑文章</a><a href="{{ url('/admin/articles') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::model($article,['method'=>'PATCH','url' => '/admin/articles/'.$article->id, 'enctype' => 'multipart/form-data']) }}
            @include('admin.articles.form')
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection
