<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/weui.css">
    <link rel="stylesheet" href="/css/book.css">
</head>
<body>
<div class="bk_title_bar">
    <img class="bk_back" src="/images/back.png" alt="" onclick="history.go(-1);">
    <p class="bk_title_content"></p>
    <img class="bk_menu" src="/images/more.png" alt="" id="showIOSActionSheet">
</div>

<div class="page">
    @yield('content')
</div>

<!-- tooltips -->
<div class="bk_toptips"><span></span></div>

<!-- BEGIN actionSheet -->
<div>
    <div class="weui-mask" id="iosMask" style="display: none"></div>
    <div class="weui-actionsheet" id="iosActionsheet">
        <div class="weui-actionsheet__menu">
            <div class="weui-actionsheet__cell" onclick="onMenuItemClick(1)">主页</div>
            <div class="weui-actionsheet__cell" onclick="onMenuItemClick(2)">书籍类别</div>
            <div class="weui-actionsheet__cell" onclick="onMenuItemClick(3)">购物车</div>
            <div class="weui-actionsheet__cell" onclick="onMenuItemClick(4)">我的订单</div>
        </div>
        <div class="weui-actionsheet__action">
            <div class="weui-actionsheet__cell" id="iosActionsheetCancel">取消</div>
        </div>
    </div>
</div>

</body>
<script src="/js/jquery-1.10.1.min.js"></script>
<script type="text/javascript">
    var $iosActionsheet = $('#iosActionsheet');
    var $iosMask = $('#iosMask');
    $(function(){
        $iosMask.on('click', hideActionSheet);
        $('#iosActionsheetCancel').on('click', hideActionSheet);
        $("#showIOSActionSheet").on("click", function(){
            $iosActionsheet.addClass('weui-actionsheet_toggle');
            $iosMask.fadeIn(200);
        });

        // 将标题栏与标题保持一致
        $('.bk_title_content').html(document.title);
    });

    function hideActionSheet() {
        $iosActionsheet.removeClass('weui-actionsheet_toggle');
        $iosMask.fadeOut(200);
    }

    function onMenuItemClick(index) {
        var mask = $('#mask');
        var weuiActionsheet = $('#iosActionsheet');
        hideActionSheet(weuiActionsheet, mask);
        if(index == 1) {
            showTopTips('敬请期待!');
        } else if(index == 2) {
            location.href = '/category';
        } else if(index == 3){
            location.href = '/cart';
        } else if(index == 4){
            location.href = '/order_list';
        }
    }
    
    function showTopTips(msg) {
        $('.bk_toptips').show();
        $('.bk_toptips span').html(msg);
        setTimeout(function () {
            $('.bk_toptips').hide();
        }, 2000);
    }

</script>

@yield('my-js')
</html>