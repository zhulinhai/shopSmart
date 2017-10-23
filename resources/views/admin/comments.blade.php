@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 4])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 评论管理</a><a href="{{ url('/admin/comments/create') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加评论</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($comments as $comment)
                        <div class="card">
                            <div class="card-header">
                                {{$comment->created_at->diffForHumans() }}
                            </div>
                            <div class="card-block">
                                <p class="card-text">{{ $comment->content }}</p>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
