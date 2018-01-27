@extends('master')

@section('title', '首页')

@section('content')
    <link rel="stylesheet" href="/css/swipe.css">
    <div class="addWrap">
        <div class="swipe" id="mySwipe">
            <div class="swipe-wrap">
                @foreach($banners as $banner)
                    <div>
                        <a href="javascript:;"><img class="img-responsive" src="{{$banner->preview}}" /></a>
                    </div>
                @endforeach
            </div>
        </div>
        <ul id="position">
            @foreach($banners as $index => $banner)
                <li class={{$index == 0 ? 'cur' : ''}}></li>
            @endforeach
        </ul>
    </div>

    <div class="weui-cells">
        @foreach($products as $product)
            <a class="weui-cell weui-cell_access" href="/product/{{ $product->id }}">
                <div class="weui-cell__hd"><img class="bk_preview" src="{{ $product->preview  }}"></div>
                <div class="weui-cell__bd">
                    <div>
                        <span class="bk_title">{{ $product->name }}</span>
                        <span class="bk_price" style="float: right">￥{{ $product->price }}</span>
                    </div>
                    <p>{{ $product->summary }}</p>
                </div>
                <div class="weui-cell__ft"></div>
            </a>
        @endforeach
    </div>

@endsection

@section('my-js')
    <script type="text/javascript" src="/js/swipe.min.js"></script>
    <script type="text/javascript">
        var bullets = document.getElementById('position').getElementsByTagName('li');
        Swipe(document.getElementById('mySwipe'), {
            auto: 2000,
            continuous: true,
            disableScroll: false,
            callback: function(pos) {
                var i = bullets.length;
                while (i--) {
                    bullets[i].className = '';
                }
                bullets[pos].className = 'cur';
            }
        });

    </script>
@endsection
