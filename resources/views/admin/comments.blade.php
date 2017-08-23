@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 4])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 评论管理</a><a href="{{ url('/comments/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加评论</a></div>
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

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
