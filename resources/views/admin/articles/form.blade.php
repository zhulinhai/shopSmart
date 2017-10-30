<div class="form-group">
    {!! Form::text('user_id',  Auth::user()->id, ['class'=>'form-control hidden']) !!}
</div>
<div class="form-group">
    {!! Form::label('head_image', '文章配图', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'control-label']) !!}
    <div class="input-group">
        <img id="headImg" src="{{ ($article && $article->preview) ? asset($article->preview):'/img/addHolder.png' }}" style="width: auto; height: 100px;" onclick="$('#preview').click()" />
        {!! Form::file('file', ['id'=>'preview', 'class'=>'form-control', 'style'=>'display:none']) !!}
        {!! Form::text('preview', ($article && $article->preview) ? $article->preview: '', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('title', '文章标题', ['class'=>'control-label']) !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('summary', '文章简介', ['class'=>'control-label']) !!}
    {!! Form::text('summary', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('content', '文章内容', ['class'=>'control-label']) !!}
    <div id="mdeditor">
        {!! Form::textarea('content', $articleContent, ['class'=>'form-control','style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('category', '文章类型', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::select('category_id', $categories, '0', ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::submit('发布文章',['class'=>'btn btn-primary form-control']) !!}
</div>

{!! editor_config('mdeditor') !!}
{!! editor_css() !!}
{!! editor_js() !!}
<script>
    $(function () {
        $("#mdeditor").width('100%');

        $("body").on('change', '#preview', function () {
            var file = $("#preview").val();
            if (file.length > 0) {
                uploadImageToServer('preview', 'images', 'headImg', function (result) {
                    $('#headImg').attr('src', result.uri);
                    $('input[name="preview"]').val(result.uri);
                });
            }

        });
    });
</script>