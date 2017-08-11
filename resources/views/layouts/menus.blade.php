<div class="col-sm-3 col-md-2 menus">
    <ul class="list-group">
        <?php $menus = array(
            array("name"=>'数据统计', 'icon'=>'img/tongji.png', 'isActive'=>false,'route'=>'home'),
            array("name"=>'商家管理', 'icon'=>'img/businessManage.png', 'isActive'=>false,'route'=>'merchants'),
            array("name"=>'活动管理', 'icon'=>'img/actManage.png', 'isActive'=>false,'route'=>'acts'),
            array("name"=>'日迹管理', 'icon'=>'img/newsManage.png', 'isActive'=>false,'route'=>'news'),
            array("name"=>'评论审核', 'icon'=>'img/commitManage.png', 'isActive'=>false,'route'=>'comments'),
            array("name"=>'会员管理', 'icon'=>'img/userManage.png', 'isActive'=>false,'route'=>'users'),
            array("name"=>'商圈管理', 'icon'=>'img/marketManage.png', 'isActive'=>false,'route'=>'markets'),
            array("name"=>'标签管理', 'icon'=>'img/tagsManage.png', 'isActive'=>false,'route'=>'tags'),
        );
        $menus[$index]['isActive'] = true;
        ?>
        @foreach ($menus as $item)
        <a href="{{ url('/'.$item['route']) }}"><li class="list-group-item {{ $item['isActive']?'active':'' }}"><img src="{{ asset($item['icon']) }}"> {{ $item['name'] }}<hr></li></a>
        @endforeach
    </ul>
</div>