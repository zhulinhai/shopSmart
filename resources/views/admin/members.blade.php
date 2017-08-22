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
                                <th class="col-xs-7">内容</th>
                                <th class="col-xs-2">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($members as $member)
                            <tr>
                                <td><input type="checkbox"></td>
                                <td><img width="100px" src="{{ asset($member->head_image)  }}" alt=""> </td>
                                <td><p>名称：{{ $member->name }}</p><p>会员等级：{{ $member->level }}   会员积分：{{ $member->score }}  注册时间：{{ $member->updated_at }} 最后登录时间: {{ $member->last_login_time }}</p></td>
                                <td>
                                    @if ($member->locked)
                                        <a href="{{ url('members/'.$member->id.'/lock') }}"><button class="btn btn-primary">解除锁定</button></a>
                                    @else
                                        <a href="{{ url('members/'.$member->id.'/edit') }}"><button class="btn btn-primary">编辑</button></a>
                                        <a href="{{ url('members/'.$member->id.'/destroy') }}"><button class="btn btn-danger">删除</button></a>
                                    @endif
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
