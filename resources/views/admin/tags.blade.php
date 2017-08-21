@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 7])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-tags"></i> 标签管理</a></div>
        </div>
        <div class="panel-body">
            <p>购物</p>
            <p>sub tags</p>
            <hr>
        </div>
    </div>

    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 添加标签</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::open(array('url' => 'tags/store')) }}
            <div class="form-group">
                {!! Form::label('name', '标签名称', ['class'=>'control-label']) !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('image', '标签图片', ['class'=>'control-label']) !!}
                <div class="input-group">
                    {!! Form::file('image', ['class'=>'form-control']) !!}
                    {!! Form::label('note', '说明：图片大小：宽120X高120 数量1', ['class'=>'input-group-addon']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('name', "父级标签", ['class'=>'control-label']) !!}
                {!! Form::select('name', array('0'=>'顶级标签','1'=>'美容','2'=>'美容','3'=>'二级标签'), '0', ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('添加标签',['class'=>'btn btn-primary form-control']) !!}
            </div>
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection
