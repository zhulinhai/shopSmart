<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('logo', '用户图像', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽200X高200 数量1', ['class'=>'control-label']) !!}
    <div class="input-group">
        <img id="previewImg" src="{{ ($member && $member->preview) ? asset($member->preview):'/img/addHolder.png' }}" style="width: auto; height: 100px;" onclick="$('#preview').click()" />
        {!! Form::file('file', ['id'=>'preview', 'class'=>'form-control', 'style'=>'display:none']) !!}
        {!! Form::text('preview', ($member && $member->preview) ? $member->preview: '', ['style'=>'display:none']) !!}
    </div>

</div>
<div class="form-group">
    {!! Form::label('name', '用户名', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('nickname', '昵称', ['class'=>'control-label']) !!}
    {!! Form::text('nickname', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('sex', '性别', ['class'=>'control-label']) !!}
    {!! Form::select('sex', array('0'=>'保密','1'=>'男','2'=>'女'), '0', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('phone', '手机号', ['class'=>'control-label']) !!}
    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('birth_day', '出生日期', ['class'=>'control-label']) !!}
    {!! Form::date('birth_day', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('active', '是否激活', ['class'=>'control-label']) !!}
    {!! Form::select('active', array('0'=>'正常','1'=>'锁定'), '0', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('device_type', '设备类型', ['class'=>'control-label']) !!}
    {!! Form::select('device_type', array('0'=>'未知','1'=>'iphone','2'=>'android'), '0', ['class'=>'form-control']) !!}
</div>
<script>
    $(function () {
        $("body").on('change', '#preview', function () {
            var file = $("#preview").val();
            if (file.length > 0) {
                uploadImageToServer('preview', 'images', 'previewImg', function (result) {
                    $('#previewImg').attr('src', result.uri);
                    $('input[name="preview"]').val(result.uri);
                });
            }

        });
    });
</script>