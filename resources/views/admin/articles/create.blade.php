@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 1])
@endsection

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 写日迹</a><a href="{{ url('/articles') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            <fieldset>
                @if (count($errors)>0)
                    <div class="am-alert am-alert-danger" data-am-alert>
                        <p>{{ $errors->first() }}</p>
                    </div>
                @endif
                {{ Form::open(array('url' => 'articles/store')) }}
                    {!! csrf_field() !!}
                    <h4 class="control-label">文章标题</h4>
                    <input id="title" name="title" class="form-control input-group-lg" type="text" value="{{ Input::old('title') }}">

                    <h4 class="control-label">文章内容</h4>
                    <textarea id="content" name="content" class="form-control" rows="20">{{ Input::old('content') }}</textarea>

                    <h4 class="control-label">文章标签</h4>
                    <div class="input-group input-group-lg col-lg-12" style="margin-top: 10px">
                        <input id="tags" name="tags" class="form-control form-control"  type="text" value="{{ Input::old('tags') }}"/>
                        <span class="input-group-addon">多个标签之间使用 "," 分割</span>
                    </div>
                    <div class="input-group col-lg-12" style="margin-top: 10px">
                        <button id="preview" type="button" class="btn btn-primary" style="margin-top: 10px"><span class="glyphicon glyphicon-eye-open"></span> 预览</button>
                        <button id="submit" name="submit" class="btn btn-success" style="margin-top: 10px;margin-left: 20px"><span class="glyphicon glyphicon-send"></span> 发布</button>
                    </div>
                {{ Form::close() }}
            </fieldset>
        </div>
        <div class="am-popup fade" id="preview-popup">
            <div class="am-popup-inner">
                <div class="am-popup-hd">
                    <h4 class="am-popup-title"></h4>
                    <span data-am-modal-close class="am-close">&times;</span>
                </div>
                <div class="am-popup-bd">
                </div>
            </div>
        </div>
        <script>
            $(function() {
                $('#preview').on('click', function() {
                    $('.am-popup-title').text($('#title').val());
                    $.post('preview', {'content': $('#content').val()}, function(data, status) {
                        $('.am-popup-bd').html(data);
                    });
                    $('#preview-popup').modal();
                });
            });
        </script>
@endsection
