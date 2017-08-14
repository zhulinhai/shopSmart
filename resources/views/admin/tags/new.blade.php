@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 7])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-tags"></i> 标签管理</a><a href="{{ url('/tags') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <form method="POST" action="{{ url('/tags/new') }}" class="form-horizontal" enctype="multipart/form-data" role="form">
                    {!! csrf_field() !!}
                    <fieldset>
                        <!-- Text input-->
                        <div class="form-group col-lg-11 col-lg-offset-1">
                            <div class="col-lg-12">
                                <h4>添加标签</h4>
                                <div class="input-group input-group-lg col-lg-12" style="margin-top: 10px">
                                    <span class="input-group-addon">标签名称</span>
                                    <input type="text" class="form-control" placeholder="标签名称">
                                </div>
                                <div class="input-group input-group-lg col-lg-12" style="margin-top: 10px">
                                    <span class="input-group-addon">标签图片</span>
                                    <input id="tagUrl" name="tagUrl" class="form-control" type="file">
                                </div>
                                <div class="input-group input-group-lg col-lg-12" style="margin-top: 10px">
                                    <span class="input-group-addon">标签层级</span>
                                    <div class="input-group input-group-lg col-lg-12  form-control" style="padding-top: 5px">
                                        <label class="radio-inline">
                                            <input type="radio" id="checkbox3" name="checkbox[]" value="0"> 一级标签
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" id="checkbox3" name="checkbox[]" value="1"> 美容
                                        </label>

                                        <label class="radio-inline">
                                            <input type="radio" id="checkbox3" name="checkbox[]" value="1"> 美容
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-11 col-lg-offset-1">
                            <div class="col-md-11">
                                <button id="submit" name="submit" class="btn btn-danger">确认</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
