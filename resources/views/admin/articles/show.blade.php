@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 3])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">文章详情<a href="{{ url('/articles') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            <h2>{{ $article->title }}</h2>
            <p class="am-article-meta">Author: <a style="cursor: pointer;">{{ $article->user->name }}</a> Datetime: {{ $article->updated_at }}</p>
            <div id="show_editor">
                <textarea style="display: none">{{$article->content}}</textarea>
            </div>
            <p>{{ $article->tags }}</p>

            @foreach ($article->comments as $comment)
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

    {!! editor_config('mdeditor') !!}
    {!! editor_css() !!}
    {!! editor_js() !!}
    <script type="text/javascript">
        $(function() {
            editormd.markdownToHTML("show_editor", {
                width: "100%",
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true  // 默认不解析
            });
        });
    </script>
@endsection