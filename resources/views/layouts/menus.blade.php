<div class="col-sm-3 col-md-2 menus">
    <ul class="list-group">
        <?php $menus = array(
            array("name"=>'数据统计', 'icon'=>'img/tongji.png', 'isActive'=>false),
            array("name"=>'商家管理', 'icon'=>'img/businessManage.png', 'isActive'=>false),
            array("name"=>'活动管理', 'icon'=>'img/actManage.png', 'isActive'=>false),
            array("name"=>'日迹管理', 'icon'=>'img/newsManage.png', 'isActive'=>false),
            array("name"=>'评论审核', 'icon'=>'img/commitManage.png', 'isActive'=>false),
            array("name"=>'会员管理', 'icon'=>'img/userManage.png', 'isActive'=>false),
            array("name"=>'商圈管理', 'icon'=>'img/marketManage.png', 'isActive'=>false),
            array("name"=>'标签管理', 'icon'=>'img/tagsManage.png', 'isActive'=>false),
        );
        $menus[$index]['isActive'] = true;
        ?>
        @foreach ($menus as $item)
        <li class="list-group-item {{ $item['isActive']?'active':'' }}"><img src="{{ asset($item['icon']) }}"><a>{{ $item['name'] }}</a><hr></li>
        @endforeach
    </ul>
</div>