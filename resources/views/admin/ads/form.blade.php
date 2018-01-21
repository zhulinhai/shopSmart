<div class="form-group">
    {!! Form::label('head_image', '广告图', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'control-label']) !!}
    <div class="form-group">
        <img id="headImg" src="{{ ($ad && $ad->preview) ? asset($ad->preview):'/img/addHolder.png' }}" style="width: auto; height: 100px;" onclick="$('#preview').click()" />
        {!! Form::file('file', ['id'=>'preview', 'class'=>'form-control', 'style'=>'display:none']) !!}
        {!! Form::text('preview', ($ad && $ad->preview) ? $ad->preview: '', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('title', '广告标题', ['class'=>'control-label']) !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('url', '广告链接', ['class'=>'control-label']) !!}
    {!! Form::text('url', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('type', '广告类型', ['class'=>'control-label']) !!}
    <div class="form-group">
        {!! Form::select('type', array('0'=>'产品广告', '1'=>'文章广告', '2'=>'其他'), ($ad && $ad->type)? $ad->type: 0, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('published_date', '开始日期', ['class'=>'control-label']) !!}
    {!! Form::date('published_date', ($ad && $ad->published_date)? $ad->published_date:\Carbon\Carbon::now() , ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('end_date', '开始日期', ['class'=>'control-label']) !!}
    {!! Form::date('end_date', ($ad && $ad->end_date)? $ad->end_date:\Carbon\Carbon::now() , ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('提交',['class'=>'btn btn-primary form-control']) !!}
</div>
<script>
    $(function () {

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