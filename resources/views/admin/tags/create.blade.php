@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 6])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title">
                <a><i class="glyphicon glyphicon-home"></i> 添加标签</a>
                <a href="{{ url('/tags') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a>
            </div>
        </div>
        <div class="panel-body" >
            {{ Form::open(array('url' => 'tags/store')) }}
                <div class="form-group">
                    {!! Form::label('name', '标签名称', ['class'=>'control-label']) !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('parent_id', "父级标签", ['class'=>'control-label']) !!}
                    {!! Form::select('parent_id', $pNodes, '0', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group" style="margin-top: 10px">
                    {!! Form::submit('创建',['class'=>'form-control btn-primary']) !!}
                </div>
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection