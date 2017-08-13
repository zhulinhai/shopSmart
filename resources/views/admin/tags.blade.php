@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 7])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-tags"></i> 标签管理</a><a href="{{ url('/tags/new') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加标签</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <form method="POST" action="{{ url('/tags/new') }}" class="form-horizontal" enctype="multipart/form-data" role="form">
                    {!! csrf_field() !!}
                    <fieldset>
                        <!-- Text input-->
                        {{--<div class="form-group col-lg-10 col-lg-offset-1">--}}
                            {{--<div class="col-lg-12">--}}
                                {{--<h4>添加标签</h4>--}}
                                {{--<div class="input-group input-group-lg col-lg-12" style="margin-top: 10px">--}}
                                    {{--<span class="input-group-addon">添加标签</span>--}}
                                    {{--<input type="text" class="form-control" placeholder="添加一级标签">--}}
                                {{--</div>--}}
                                {{--<div class="input-group input-group-lg col-lg-12" style="margin-top: 10px">--}}
                                    {{--<span class="input-group-addon">标签图片</span>--}}
                                    {{--<input id="tagUrl" name="tagUrl" class="form-control" type="file">--}}
                                {{--</div>--}}
                                {{--<span class="input-group-btn" ><button id="submit" name="submit" class="btn btn-danger"  style="margin-top: 10px" type="button">确认</button></span>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
