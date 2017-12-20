@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 1])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 广告管理</a><a href="{{ url('/admin/ads/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加广告</a></div>
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
                            @foreach ($ads as $ad)
                                <tr>
                                    <td><img width="100px" src="{{ asset($ad->preview)  }}" alt=""></td>
                                    <td>{{ $ad->title }}</td>
                                    <td>{{ $ad->url }}</td>
                                    <td>{{ $ad->published_date }}</td>
                                    <td><a href="{{ url('/admin/ads/'.$ad->id.'/edit') }}"><button class="btn btn-primary">编辑</button></a>
                                        <a href="{{ url('/admin/ads/'.$ad->id.'/destroy') }}"><button class="btn btn-danger">删除</button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="nav-box">
                        {{ $ads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
