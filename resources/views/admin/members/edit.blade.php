@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 1])
@endsection

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-home"></i> 商家管理</a><a href="{{ url('/merchants/add') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加商家</a></div>
        </div>
        <div class="panel-body" >
            <form method="POST" action="{{ url('/merchants/save') }}" class="form-horizontal" enctype="multipart/form-data" role="form">
                {!! csrf_field() !!}
                <fieldset>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="name"><i class="glyphicon glyphicon-star"></i> 商家名称：</label>
                        <div class="col-md-9">
                            <input id="name" name="name" type="text" placeholder="商品名称" value="{{ $merchant->name }}" class="form-control input-md" required="">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="head_image"><i class="glyphicon glyphicon-star"></i> 商家主图：</label>
                        <div class="col-md-9">
                            <input id="head_image" name="head_image" class="btn btn-primary navbar-left" type="file">
                            <label class="control-label col-xs-offset-1 navbar-left">说明：图片大小：宽640X高320 数量1</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="logo"><i class="glyphicon glyphicon-star"></i> 商家LOGO图：</label>
                        <div class="col-md-9">
                            <input id="logo" name="logo" class="btn btn-primary navbar-left" type="file">
                            <label class="control-label col-xs-offset-1 navbar-left">说明：图片大小：宽640X高320 数量1</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="address"><i class="glyphicon glyphicon-star"></i> 商家地址：</label>
                        <div class="col-md-9">
                            <input id="address" name="address" type="text" placeholder="商家地址" value="{{ $merchant->address }}" class="form-control input-md" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="tel">商家电话：</label>
                        <div class="col-md-9">
                            <input id="tel" name="tel" type="text" placeholder="商家电话" value="{{ $merchant->tel }}" class="form-control input-md" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="tags">商家类型：</label>
                        <div class="col-md-9">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="submit"></label>
                        <div class="col-md-9">
                            <button id="submit" name="submit" class="btn btn-danger">确认</button>
                        </div>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
@endsection