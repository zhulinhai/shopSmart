@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 3])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 日迹管理</a><a href="{{ url('/articles/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加文章</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-xs-1">选择</th>
                                <th class="col-xs-2">LOGO</th>
                                <th class="col-xs-8">内容</th>
                                <th class="col-xs-1">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($articles as $article)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{ $articles->title }}</td>
                                    <td><a href="{{ url('/articles/edit/'.$article->id) }}"><button class="btn btn-primary">锁定</button></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
