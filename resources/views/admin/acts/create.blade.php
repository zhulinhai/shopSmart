@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 2])
@endsection

@section('content')


    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 活动管理</a><a href="{{ url('/acts') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-backward"></i> 返回</a></div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="{{ url('/acts/store') }}" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name"><i class="glyphicon glyphicon-star"></i> 活动名称：</label>
                        <div class="input-group col-md-9">
                            <input id="name" name="name" type="text" placeholder="活动名称" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="name"><i class="glyphicon glyphicon-star"></i> 活动名称：</label>
                        <div class="col-md-4" style="padding: 0;">
                            <div class="input-group">
                                <input id="start_date" name="start_date" type="text" placeholder="起始时间" class="form-control input-md" required="">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <div class="input-group-btn"><div class="btn">至</div></div>
                            </div>
                        </div>
                        <div class="col-md-4" style="padding: 0;">
                            <div class="input-group">
                                <input id="end_date" name="end_date" type="text" placeholder="结束时间" class="form-control input-md" required="">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="logo"><i class="glyphicon glyphicon-star"></i> 活动优惠：</label>
                        <div class="input-group col-md-9">
                            <input id="privilege" name="privilege" type="text" placeholder="活动优惠" class="form-control input-md col-md-6" required="">
                            <span class="input-group-addon" id="sizing-addon2">说明：请填写折扣或价格</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="head_image"><i class="glyphicon glyphicon-star"></i> 活动内容：</label>
                        <div class="input-group col-md-9">
                            <textarea id="markdown-editor" name="content" class="form-control" rows="12"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="head_image"><i class="glyphicon glyphicon-star"></i> 活动主图：</label>
                        <div class="input-group col-md-9">
                            <input id="head_image" name="head_image" class="form-control input-md" type="file">
                            <label class="input-group-addon">说明：图片大小：宽640X高320 数量1</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="logo"><i class="glyphicon glyphicon-star"></i> 活动图片：</label>
                        <div class="input-group col-md-9">
                            @for( $i = 0;$i< 4;$i++)
                                <input name="image" class="form-control input-md" type="file">
                            @endfor
                            <label class="input-group-addon">说明：图片大小：宽640X高320 数量1</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="tags">上传时间：</label>
                        <div class="input-group col-md-9">
                            <input id="name" name="name" type="text" placeholder="上传时间" class="form-control input-md col-md-6" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="submit"></label>
                        <button id="submit" name="submit" class="btn btn-danger">确认</button>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
@endsection
