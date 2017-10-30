<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('name', '活动名称', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('privce', '活动价格', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::number('price', null, ['class'=>'form-control']) !!}
        <span class="input-group-addon" id="sizing-addon2">说明：请填写折扣或价格</span>
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('summary', '活动简介', ['class'=>'control-label']) !!}
    {!! Form::textarea('summary', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('content', '活动内容', ['class'=>'control-label']) !!}
    <div id="mdeditor">
        {!! Form::textarea('content', $pdt_content, ['class'=>'form-control', 'style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('head_image', '预览图', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'control-label']) !!}
    <div class="input-group">
        <img id="previewImg" src="{{ ($product && $product->preview) ? asset($product->preview):'/img/addHolder.png' }}" style="width: auto; height: 100px;" onclick="$('#preview').click()" />
        {!! Form::file('file', ['id'=>'preview', 'class'=>'form-control', 'style'=>'display:none']) !!}
        {!! Form::text('preview', ($product && $product->preview) ? $product->preview: '', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('image', '产品图片', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽640X高320 最多数量5', ['class'=>'control-label']) !!}
    <div class="input-group">
        <img id="actImg1" src="{{ $pdt_images[0] ? asset($pdt_images[0]):'/img/addHolder.png' }}" style="width: auto; height: 100px;" onclick="$('#fileAct1').click()" />
        {!! Form::file('file', ['id'=>'fileAct1', 'class'=>'form-control', 'style'=>'display:none']) !!}
        <img id="actImg2" src="{{ $pdt_images[1] ? asset($pdt_images[1]):'/img/addHolder.png' }}" style="width: auto; height: 100px; margin-left: 10px" onclick="$('#fileAct2').click()" />
        {!! Form::file('file', ['id'=>'fileAct2', 'class'=>'form-control', 'style'=>'display:none']) !!}
        <img id="actImg3" src="{{ $pdt_images[2] ? asset($pdt_images[2]):'/img/addHolder.png' }}" style="width: auto; height: 100px; margin-left: 10px" onclick="$('#fileAct3').click()" />
        {!! Form::file('file', ['id'=>'fileAct3', 'class'=>'form-control', 'style'=>'display:none']) !!}
        <img id="actImg4" src="{{ $pdt_images[3] ? asset($pdt_images[3]):'/img/addHolder.png' }}" style="width: auto; height: 100px; margin-left: 10px" onclick="$('#fileAct4').click()" />
        {!! Form::file('file', ['id'=>'fileAct4', 'class'=>'form-control', 'style'=>'display:none']) !!}
        <img id="actImg5" src="{{ $pdt_images[4] ? asset($pdt_images[4]):'/img/addHolder.png' }}" style="width: auto; height: 100px; margin-left: 10px" onclick="$('#fileAct5').click()" />
        {!! Form::file('file', ['id'=>'fileAct5', 'class'=>'form-control', 'style'=>'display:none']) !!}

        {!! Form::text('fileAct1', $pdt_images[0] ? $pdt_images[0]: '', ['style'=>'display:none']) !!}
        {!! Form::text('fileAct2', $pdt_images[1] ? $pdt_images[1]: '', ['style'=>'display:none']) !!}
        {!! Form::text('fileAct3', $pdt_images[2] ? $pdt_images[2]: '', ['style'=>'display:none']) !!}
        {!! Form::text('fileAct4', $pdt_images[3] ? $pdt_images[3]: '', ['style'=>'display:none']) !!}
        {!! Form::text('fileAct5', $pdt_images[4] ? $pdt_images[4]: '', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('category', '类型', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::select('category_id', $categories, '0', ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('count', '产品数量', ['class'=>'control-label']) !!}
    {!! Form::number('count', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('sale_count', '已销售', ['class'=>'control-label']) !!}
    {!! Form::number('sale_count', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', '活动状态', ['class'=>'control-label']) !!}
    {!! Form::select('status', array('0'=>'提交', '1'=>'审核中', '2'=>'上线', '3'=>'已下架'), null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('end_date', '结束时间', ['class'=>'control-label']) !!}
    {!! Form::date('end_date', ($product && $product->end_date)? $product->end_date:\Carbon\Carbon::now(), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', '发布日期', ['class'=>'control-label']) !!}
    {!! Form::date('published_at', ($product && $product->published_at)? $product->published_at:\Carbon\Carbon::now() , ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('发布活动',['class'=>'btn btn-primary form-control']) !!}
</div>

{!! editor_config('mdeditor') !!}
{!! editor_css() !!}
{!! editor_js() !!}
<script>
    $(function () {
        var editor = editormd('mdeditor', {
            width: '100%',
            imageUpload: true,
            imageFormats: ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'webp'],
            imageUploadURL: '{{ url('/api/upload/images') }}'
        });


        var arrList = [
            ['preview', 'previewImg'],
            ['fileAct1', 'actImg1'],
            ['fileAct2', 'actImg2'],
            ['fileAct3', 'actImg3'],
            ['fileAct4', 'actImg4'],
            ['fileAct5', 'actImg5']
        ];
        arrList.forEach(function (item) {
            $("body").on('change', "#"+ item[0],function () {
                var file = $("#"+ item[0]).val();
                if (file.length > 0) {
                    uploadImageToServer(item[0],'images', item[1], function (result) {
                        $('#' + item[1]).attr('src', result.uri);
                        $('input[name="' + item[0] + '"]').val(result.uri);
                    });
                }
            });
        });

    });
</script>