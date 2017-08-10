@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 0])
@endsection

@section('content')
    <p class="head-title"><i class="glyphicon glyphicon-signal"></i> 数据统计</p>
    <div class="col-xs-9">
        <?php $items = array(
            array('num'=>'5888','name'=>'活动'),
            array('num'=>'4888','name'=>'商家'),
            array('num'=>'8','name'=>'日迹'),
            array('num'=>'52688','name'=>'会员'),
            array('num'=>'456888','name'=>'总评论')
        );
        ?>

    @foreach($items as $item)
        <div class="col-sm-3 col-md-2">
            <h3 class="list-group-item-heading">{{ $item['num'] }}</h3>
            <p class="list-group-item-text">{{ $item['name'] }}</p>
        </div>
    @endforeach

    </div>
@endsection
