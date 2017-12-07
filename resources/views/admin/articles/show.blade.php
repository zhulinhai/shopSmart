@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 3])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">文章详情<a href="{{ url('/admin/articles') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            <h2>{{ $article->title }}</h2>
            <p class="am-article-meta">作者: <a style="cursor: pointer;">{{ $article->user_id }}</a> 日期: {{ $article->updated_at }}</p>
            <div id="show_editor">
                {!! $articleContent !!}
            </div>

            {{--@foreach ($article->comments as $comment)--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header">--}}
                        {{--{{$comment->created_at->diffForHumans() }}--}}
                    {{--</div>--}}
                    {{--<div class="card-block">--}}
                        {{--<p class="card-text">{{ $comment->content }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<br>--}}
            {{--@endforeach--}}
        </div>
    </div>
@endsection