<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('name', '活动名称', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('privce', '活动价格', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::text('privilege', null, ['class'=>'form-control']) !!}
        <span class="input-group-addon" id="sizing-addon2">说明：请填写折扣或价格</span>
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('mdeditor', '活动简介', ['class'=>'control-label']) !!}
    {!! Form::textarea('summary', '', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('mdeditor', '活动内容', ['class'=>'control-label']) !!}
    <div id="mdeditor">
        {!! Form::textarea('content', null, ['class'=>'form-control','style'=>'display:none; ']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('head_image', '预览图', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'control-label']) !!}
    <div class="input-group">
        <img id="previewImg" src="/img/addHolder.png" style="width: auto; height: 100px;" onclick="$('#preview').click()" />
        {!! Form::file('file', ['id'=>'preview', 'class'=>'form-control', 'style'=>'display:none']) !!}
        {!! Form::text('preview', '', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('image', '产品图片', ['class'=>'control-label']) !!}
    {!! Form::label('note', '说明：图片大小：宽640X高320 最多数量5', ['class'=>'control-label']) !!}
    <div class="input-group">
        <img id="actImg1" src="/img/addHolder.png" style="width: auto; height: 100px;" onclick="$('#fileAct1').click()" />
        {!! Form::file('file', ['id'=>'fileAct1', 'class'=>'form-control', 'style'=>'display:none']) !!}
        <img id="actImg2" src="/img/addHolder.png" style="width: auto; height: 100px; margin-left: 10px" onclick="$('#fileAct2').click()" />
        {!! Form::file('file', ['id'=>'fileAct2', 'class'=>'form-control', 'style'=>'display:none']) !!}
        <img id="actImg3" src="/img/addHolder.png" style="width: auto; height: 100px; margin-left: 10px" onclick="$('#fileAct3').click()" />
        {!! Form::file('file', ['id'=>'fileAct3', 'class'=>'form-control', 'style'=>'display:none']) !!}
        <img id="actImg4" src="/img/addHolder.png" style="width: auto; height: 100px; margin-left: 10px" onclick="$('#fileAct4').click()" />
        {!! Form::file('file', ['id'=>'fileAct4', 'class'=>'form-control', 'style'=>'display:none']) !!}
        <img id="actImg5" src="/img/addHolder.png" style="width: auto; height: 100px; margin-left: 10px" onclick="$('#fileAct5').click()" />
        {!! Form::file('file', ['id'=>'fileAct5', 'class'=>'form-control', 'style'=>'display:none']) !!}

        {!! Form::text('fileAct1', '', ['style'=>'display:none']) !!}
        {!! Form::text('fileAct2', '', ['style'=>'display:none']) !!}
        {!! Form::text('fileAct3', '', ['style'=>'display:none']) !!}
        {!! Form::text('fileAct4', '', ['style'=>'display:none']) !!}
        {!! Form::text('fileAct5', '', ['style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('category', '类型', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::select('category', $categories, '0', ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('counts', '产品数量', ['class'=>'control-label']) !!}
    {!! Form::text('counts', 0, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('sale_count', '已销售', ['class'=>'control-label']) !!}
    {!! Form::text('sale_count', 0, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', '活动状态', ['class'=>'control-label']) !!}
    {!! Form::select('status', array('0'=>'提交', '1'=>'审核中', '2'=>'上线', '3'=>'已下架'), '0', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('start_date', '开始时间', ['class'=>'control-label']) !!}
    {!! Form::date('start_date', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('end_date', '结束时间', ['class'=>'control-label']) !!}
    {!! Form::date('end_date', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('published_at', '发布日期', ['class'=>'control-label']) !!}
    {!! Form::input('date','published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('发布活动',['class'=>'btn btn-primary form-control']) !!}
</div>

{!! editor_config('mdeditor') !!}
{!! editor_css() !!}
{!! editor_js() !!}
<script>
    $(function () {
        $("#mdeditor").width('100%');

        var arrList = [
            ['preview', 'previewImg'],
            ['fileAct1', 'actImg1'],
            ['fileAct2', 'actImg2'],
            ['fileAct3', 'actImg3'],
            ['fileAct4', 'actImg4'],
            ['fileAct5', 'actImg5']
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