<div class="form-group">
    {!! Form::text('user_id',  Auth::user()->id, ['class'=>'form-control hidden']) !!}
</div>
<div class="form-group">
    {!! Form::label('title', '文章标题', ['class'=>'control-label']) !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', '文章内容', ['class'=>'control-label']) !!}
    <div id="mdeditor">
        {!! Form::textarea('content', null, ['class'=>'form-control','style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('head_image', '文章配图', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::file('head_image', ['class'=>'form-control']) !!}
        {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'input-group-addon']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('tags', '标签', ['class'=>'control-label']) !!}
    {!! Form::text('tags', null, ['class'=>'form-control']) !!}
    {!! Form::label('note', '多个标签之间使用 "," 分割') !!}
</div>

<div class="form-group">
    {!! Form::submit('发布文章',['class'=>'btn btn-primary form-control']) !!}
</div>

{!! editor_css() !!}
{!! editor_js() !!}
{!! editor_config('mdeditor') !!}
<script>
    $(function () {
        $('#mdeditor').width('100%');
    });
</script>