@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 1])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 商家列表</a><a href="{{ url('/admin/merchants/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加商家</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-xs-2">LOGO</th>
                                <th class="col-xs-3">主图</th>
                                <th class="col-xs-5">内容</th>
                                <th class="col-xs-2">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($merchants as $merchant)
                                <tr>
                                    <td><img width="100px" src="{{ asset($merchant->logoFile)  }}" alt=""></td>
                                    <td><img width="240px" src="{{ asset($merchant->headFile)  }}" alt=""></td>
                                    <td><p>名称：{{ $merchant->name }}</p><p>电话：{{ $merchant->tel }}</p><p>地址：{{ $merchant->address }}</p><p>类型：{{ $merchant->types }}</p><p>上传时间：{{ $merchant->updated_at }}</p></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('/admin/merchants/'.$merchant->id.'/edit') }}"><button class="btn btn-primary">编辑</button></a>
                                            <a href="{{ url('/admin/merchants/'.$merchant->id.'/destroy') }}"><button class="btn btn-danger">下架</button></a>
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
