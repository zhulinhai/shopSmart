<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('logo', '商家Logo', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽200X高200 数量1', ['class'=>'control-label']) !!}
    <div class="form-group">
        <img id="logoImg" src="{{ ($merchant && $merchant->logoFile) ? asset($merchant->logoFile):'/img/addHolder.png' }}" style="width: auto; height: 100px;" onclick="$('#logoFile').click()" />
        {!! Form::file('file', ['id'=>'logoFile', 'class'=>'form-control', 'style'=>'display:none']) !!}
        {!! Form::text('logoFile', ($merchant && $merchant->logoFile) ? $merchant->logoFile: '', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('head_image', '商家主图', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'control-label']) !!}
    <div class="form-group">
        <img id="headImg" src="{{ ($merchant && $merchant->headFile) ? asset($merchant->headFile):'/img/addHolder.png' }}" style="width: auto; height: 100px;" onclick="$('#headFile').click()" />
        {!! Form::file('file', ['id'=>'headFile', 'class'=>'form-control', 'style'=>'display:none']) !!}
        {!! Form::text('headFile', ($merchant && $merchant->headFile) ? $merchant->headFile: '', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', '商家名称', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('address', '地址', ['class'=>'control-label']) !!}
    {!! Form::text('address', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('tel', '电话', ['class'=>'control-label']) !!}
    {!! Form::text('tel', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('category', '商家类型', ['class'=>'control-label']) !!}
    <div class="form-group">
        {!! Form::select('category_id', $categories, ($merchant)?$merchant->category_id:0, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('published_at', '发布日期', ['class'=>'control-label']) !!}
    {!! Form::date('published_at', ($merchant && $merchant->published_at)? $merchant->published_at:\Carbon\Carbon::now() , ['class'=>'form-control']) !!}
</div>
<div class="form-group" style="margin-top: 10px">
    {!! Form::submit('发布',['class'=>'form-control btn-primary']) !!}
</div>
<script>
    $(function () {
        $("body").on('change','#logoFile',function () {
            var file = $("#logoFile").val();
            if (file.length > 0) {
                uploadImageToServer('logoFile','images', 'logoImg', function (result) {
                    $('#logoImg').attr('src', result.uri);
                    $('input[name="logoFile"]').val(result.uri);
                });
            }

        });

        $("body").on('change','#headFile',function () {
            var file = $("#headFile").val();
            if (file.length > 0) {
                uploadImageToServer('headFile','images', 'headImg', function (result) {
                    $('#headImg').attr('src', result.uri);
                    $('input[name="headFile"]').val(result.uri);
                });
            }
        });

    });
</script>