@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 1])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 商家列表</a><a href="{{ url('/merchants/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加商家</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="col-xs-2">LOGO</td>
                                <td class="col-xs-7">内容</td>
                                <td class="col-xs-2">操作</td>
                                <td class="col-xs-1">选择</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($merchants as $merchant)
                                <tr>
                                    <td>{{ $merchant->logo }}</td>
                                    <td><p>名称：{{ $merchant->name }}</p><p>类型：{{ $merchant->types }}</p><p>上传时间：{{ $merchant->updated_at }}</p></td>
                                    <td><a href="{{ url('merchants/edit/'.$merchant->id) }}"><button class="btn btn-primary">编辑</button></a> <a href="{{ url('merchants/destroy/'.$merchant->id) }}"><button class="btn btn-danger">下架</button></a></td>
                                    <td><input type="checkbox"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
