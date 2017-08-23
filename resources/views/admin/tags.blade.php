@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 6])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                <a><i class="glyphicon glyphicon-tags"></i> 标签管理</a>
                <a href="{{ url('/tags/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加标签</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-xs-2">图像</th>
                        <th class="col-xs-4">标签</th>
                        <th class="col-xs-4">父标签</th>
                        <th class="col-xs-2">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                        <tr>
                            <td><img width="100px" src="{{ asset($tag->image)  }}" alt=""> </td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->parent_id }}</td>
                            <td>
                                <a href="{{ url('tags/'.$tag->id.'/edit') }}"><button class="btn btn-primary">编辑</button></a>
                                <a href="{{ url('tags/'.$tag->id.'/destroy') }}"><button class="btn btn-danger">删除</button></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
