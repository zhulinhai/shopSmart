@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 6])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 标签编辑</a><a href="{{ url('/tags') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            {{ Form::open(array('url' => 'tags/'.$tag->id.'/upfile', 'enctype' => 'multipart/form-data')) }}
                <div class="form-group">
                    {!! Form::label('image', '标签', ['class'=>'control-label']) !!}
                    <div class="input-group">
                        {!! Form::file('image', ['class'=>'form-control']) !!}
                        {!! Form::label('note', '说明：图片大小：宽100X高100 数量1', ['class'=>'input-group-addon']) !!}
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::submit('上传',['class'=>'form-control btn-primary']) !!}
                </div>
            {{ Form::close() }}

            {{ Form::model($tag,['method'=>'PATCH','url' => 'tags/'.$tag->id]) }}
                <div class="form-group">
                    {!! Form::label('name', '标签名称', ['class'=>'control-label']) !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('parent_id', "父级标签", ['class'=>'control-label']) !!}
                    {!! Form::select('parent_id', $pNodes, '0', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group" style="margin-top: 10px">
                    {!! Form::submit('更新',['class'=>'form-control btn-primary']) !!}
                </div>
            {{ Form::close() }}
            @include('admin.errors.list')
        </div>
    </div>
@endsection