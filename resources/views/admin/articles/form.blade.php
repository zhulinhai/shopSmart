<div class="form-group">
    {!! Form::text('user-id', null, ['class'=>'form-control hidden']) !!}
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
    {!! Form::label('published_at', '发布日期', ['class'=>'control-label']) !!}
    {!! Form::input('date','published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tags', '标签', ['class'=>'control-label']) !!}
    {!! Form::text('tags', null, ['class'=>'form-control']) !!}
    {!! Form::label('note', '多个标签之间使用 "," 分割') !!}
</div>

<div class="input-group col-lg-12" style="margin-top: 10px">
    <button id="preview" type="button" class="btn btn-primary" style="margin-top: 10px"><span class="glyphicon glyphicon-eye-open"></span> 预览</button>
    <button id="submit" name="submit" class="btn btn-success" style="margin-top: 10px;margin-left: 20px"><span class="glyphicon glyphicon-send"></span> 发布</button>
</div>
{!! editor_css() !!}
{!! editor_js() !!}
{!! editor_config('mdeditor') !!}
<script>
    $(function () {
        $('#mdeditor').width('100%');
    });
</script>