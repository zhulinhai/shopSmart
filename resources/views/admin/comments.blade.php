@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 4])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 评论管理</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-xs-2">用户</th>
                                <th class="col-xs-4">内容</th>
                                <th class="col-xs-1">日期</th>
                                <th class="col-xs-1">评论类型</th>
                                <th class="col-xs-2">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $comment)
                                <tr>
                                    <th></th>
                                    <th>{{ $comment->content }}</th>
                                    <th>{{$comment->created_at->diffForHumans() }}</th>
                                    <th></th>
                                    <th>精选</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
