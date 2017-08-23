<div class="form-group">
    {!! Form::label('head_image', '用户图像', ['class'=>'control-label']) !!}
    <div class="input-group">
        {!! Form::file('head_image', ['class'=>'form-control']) !!}
        {!! Form::label('note', '说明：图片大小：宽200X高200 数量1', ['class'=>'input-group-addon']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('name', '用户名', ['class'=>'control-label']) !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('nick_name', '昵称', ['class'=>'control-label']) !!}
    {!! Form::text('nick_name', null, ['class'=>'form-control']) !!}
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
    {!! Form::label('birthday', '出生日期', ['class'=>'control-label']) !!}
    {!! Form::date('birthday', \Carbon\Carbon::now(), ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('level', '等级', ['class'=>'control-label']) !!}
    {!! Form::text('level', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('score', '积分', ['class'=>'control-label']) !!}
    {!! Form::text('score', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('locked', '是否锁定', ['class'=>'control-label']) !!}
    {!! Form::select('locked', array('0'=>'正常','1'=>'锁定'), '0', ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('deviceType', '设备类型', ['class'=>'control-label']) !!}
    {!! Form::select('deviceType', array('0'=>'未知','1'=>'iphone','2'=>'android'), '0', ['class'=>'form-control']) !!}
</div>
