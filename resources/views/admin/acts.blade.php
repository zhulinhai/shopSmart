@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 2])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 活动列表</a><a href="{{ url('/acts/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加活动</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-xs-3">主图</th>
                                <th class="col-xs-6">内容</th>
                                <th class="col-xs-2">操作</th>
                                <th class="col-xs-1">选择</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($acts as $act)
                            <tr>
                                <td><img  src="{{ asset( $act->head_image)  }}" alt=""></td>
                                <td><p>{{ $act->name }}</p>
                                    <p>内容：{{ $act->content }}</p>
                                    <p>上传时间：{{ $act->updated_at }}</p>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ url('acts/'.$act->id.'/edit') }}"><button class="btn btn-primary">编辑</button></a>
                                        <a href="{{ url('acts/destroy/'.$act->id) }}"><button class="btn btn-danger">下架</button></a>
                                    </div>
                                </td>
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
