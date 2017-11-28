@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 0])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-signal"></i> 数据统计</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <?php $items = array(
                    array('num'=>$counts['product'],'name'=>'活动'),
                    array('num'=>$counts['merchant'],'name'=>'商家'),
                    array('num'=>$counts['article'],'name'=>'日迹'),
                    array('num'=>$counts['member'],'name'=>'会员'),
                    array('num'=>$counts['comment'],'name'=>'总评论')
                );
                ?>
                @foreach($items as $item)
                    <div class="col-sm-3 col-md-2">
                        <h3 class="list-group-item-heading">{{ $item['num'] }}</h3>
                        <p class="list-group-item-text">{{ $item['name'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
