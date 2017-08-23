@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 3])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 日迹管理</a><a href="{{ url('/articles/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 写日迹</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-xs-2">图片</th>
                                <th class="col-xs-2">标题</th>
                                <th class="col-xs-4">内容</th>
                                <th class="col-xs-2">发表日期</th>
                                <th class="col-xs-2">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td><img width="100px" src="{{ asset($article->head_image)  }}" alt=""></td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->summary }}</td>
                                    <td>{{ $article->published_at->diffForHumans() }}</td>
                                    <td><a href="{{ url('/articles/'.$article->id.'/edit') }}"><button class="btn btn-primary">编辑</button></a>
                                        <a href="{{ url('/articles/'.$article->id) }}"><button class="btn btn-primary">预览</button></a>
                                        <a href="{{ url('/articles/'.$article->id.'/destroy') }}"><button class="btn btn-danger">删除</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
