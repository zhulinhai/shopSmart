@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 2])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 产品列表</a><a href="{{ url('/admin/products/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加产品</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-xs-2">主图</th>
                                <th class="col-xs-8">内容</th>
                                <th class="col-xs-1">状态</th>
                                <th class="col-xs-1">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><img style="width: auto; height: 100px" src="{{ asset( $product->preview)  }}" alt=""></td>
                                <td><p>标题：{{ $product->name }}</p>
                                    <p>内容：{{ $product->summary }}</p>
                                    <p>上传时间：{{ $product->updated_at }}</p>
                                </td>
                                <td>
                                    {{ $product->status }}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('admin/products/'.$product->id.'/edit') }}"><button class="btn btn-primary">编辑</button></a>
                                        <a href="{{ url('admin/products/'.$product->id.'/destroy') }}"><button class="btn btn-danger">下架</button></a>
                                        <a href="{{ url('admin/comments/'.$product->id.'/addComment') }}"><button class="btn btn-danger">添加评论</button></a>
                                    </div>
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
