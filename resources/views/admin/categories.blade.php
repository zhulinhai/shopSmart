@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 6])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                <a><i class="glyphicon glyphicon-tags"></i> 标签管理</a>
                <a href="{{ url('/admin/categories/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加标签</a>
            </div>
        </div>
        <div class="panel-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-xs-2">图像</th>
                        <th class="col-xs-4">名称</th>
                        <th class="col-xs-2">id</th>
                        <th class="col-xs-1">父id</th>
                        <th class="col-xs-1">类型</th>
                        <th class="col-xs-2">操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td><img width="100px" src="{{ asset($category->preview)  }}" alt=""> </td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->parent_id }}</td>
                            <td>{{ $category->type  }}</td>
                            <td>
                                <a href="{{ url('/admin/categories/'.$category->id.'/edit') }}"><button class="btn btn-primary">编辑</button></a>
                                <a href="{{ url('/admin/categories/'.$category->id.'/destroy') }}"><button class="btn btn-danger">删除</button></a>
                            </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="nav-box">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
