<div class="form-group">
    {!! Form::text('user_id',  Auth::user()->id, ['class'=>'form-control hidden']) !!}
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('name', '活动名称', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('privilege', '活动优惠', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::text('privilege', null, ['class'=>'form-control']) !!}
        <span class="input-group-addon" id="sizing-addon2">说明：请填写折扣或价格</span>
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('mdeditor', '活动内容', ['class'=>'control-label']) !!}
    <div id="mdeditor">
        {!! Form::textarea('content', null, ['class'=>'form-control','style'=>'display:none']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('head_image', '活动主图', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::file('head_image', ['class'=>'form-control']) !!}
        {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'input-group-addon']) !!}
    </div>
</div>
<div class="form-group">
    <i class="glyphicon glyphicon-star"></i>
    {!! Form::label('image', '活动图片', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::file('images[]', ['class'=>'form-control', 'multiple'=>'true']) !!}
        {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'input-group-addon']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('counts', '活动数量', ['class'=>'control-label']) !!}
    {!! Form::text('counts', 0, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('sale_count', '已销售', ['class'=>'control-label']) !!}
    {!! Form::text('sale_count', 0, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('status', '活动状态', ['class'=>'control-label']) !!}
    {!! Form::select('status', array('0'=>'审核中'), '0', ['class'=>'form-control']) !!}
</div>
{{--<div class="form-group">--}}
    {{--{!! Form::label('merchant_id', '绑定商家', ['class'=>'control-label']) !!}--}}
    {{--{!! Form::select('merchant_id', $merchants, '0', ['class'=>'form-control']) !!}--}}
{{--</div>--}}
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
    });
</script>