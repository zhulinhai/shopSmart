@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 5])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 会员管理</a><a href="{{ url('/members/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加会员</a></div>
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
                        @foreach ($members as $member)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td>{{ $member->logo }}</td>
                                <td><p>名称：{{ $member->name }}</p><p>会员等级：高级   会员节分：2358  类型：{{ $merchant->types }} 注册时间：{{ $merchant->updated_at }} 最后登录时间</p></td>
                                <td><a href="{{ url('merchants/edit/'.$merchant->id) }}"><button class="btn btn-primary">锁定</button></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
