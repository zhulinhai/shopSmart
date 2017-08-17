<div class="form-group">
    {!! Form::label('name', '商家名称', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('head_image', '商家主图', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::file('head_image', ['class'=>'form-control']) !!}
        {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'input-group-addon']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('logo', '商家Logo', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::file('logo', ['class'=>'form-control']) !!}
        {!! Form::label('note', '说明：图片大小：宽640X高320 数量1', ['class'=>'input-group-addon']) !!}
    </div>
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
    {!! Form::label('types', '商家类型', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::text('types', null, ['class'=>'form-control']) !!}
        {!! Form::label('note', '多个标签之间使用 "," 分割', ['class'=>'input-group-addon']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('published_at', '发布日期', ['class'=>'control-label']) !!}
    {!! Form::input('date','published_at', date('Y-m-d'), ['class'=>'form-control']) !!}
</div>
<div class="form-group" style="margin-top: 10px">
    {!! Form::submit('发布') !!}
</div>
