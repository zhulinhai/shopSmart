@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 5])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 会员创建</a><a href="{{ url('/members') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::open(array('url' => 'members/'.$member->id.'/upfile', 'enctype' => 'multipart/form-data')) }}
            <div class="form-group">
                {!! Form::label('head_image', '用户图像', ['class'=>'control-label']) !!}
                <div class="input-group">
                    {!! Form::file('head_image', ['class'=>'form-control']) !!}
                    {!! Form::label('note', '说明：图片大小：宽200X高200 数量1', ['class'=>'input-group-addon']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::submit('上传',['class'=>'form-control btn-primary']) !!}
            </div>
            {{ Form::close() }}

            {{ Form::model($member,['method'=>'PATCH','url' => 'members/'.$member->id]) }}
            @include('admin.members.form')
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection