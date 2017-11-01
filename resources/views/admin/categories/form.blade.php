<div class="form-group">
    {!! Form::label('image', '标签缩略图', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽100 X 高100 数量1', ['class'=>'control-label']) !!}
    <div class="input-group">
        <img id="previewImg" src="{{ $category ? asset($category->preview):'/img/addHolder.png' }}" style="width: auto; height: 100px;" onclick="$('#preview').click()" />
        {!! Form::file('file', ['id'=>'preview', 'class'=>'form-control', 'style'=>'display:none']) !!}
        {!! Form::text('preview', $category ? $category->preview:'', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', '标签名称', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('parent_id', "父级标签", ['class'=>'control-label']) !!}
    {!! Form::select('parent_id', $pNodes, '0', ['class'=>'form-control']) !!}
</div>
<div class="form-group" style="display: none">
    {!! Form::label('parent_id', "类型", ['class'=>'control-label']) !!}
    {!! Form::select('type', ['0'=>'活动标签', '1'=>'文章标签', '2'=>'商家标签'], 0, ['class'=>'form-control']) !!}
</div>
<div class="form-group" style="margin-top: 10px">
    {!! Form::submit('提交',['class'=>'form-control btn-primary']) !!}
</div>

<script>
    $(function () {
        $("#mdeditor").width('100%');

        var arrList = [
            ['preview', 'previewImg']
        ];
        arrList.forEach(function (item) {
            $('#' + item[0]).change(function () {
                uploadImageToServer(item[0],'images', item[1], function (result) {
                    $('#' + item[1]).attr('src', result.uri);
                    $('input[name="' + item[0] + '"]').val(result.uri);
                });
            });
        });

    });
</script>