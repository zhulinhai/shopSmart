@extends('master')
@section('title', '书籍类别')

@section('content')
    <div class="weui-cells__title">选择书籍类别</div>
    <div class="weui-cells">
        <div class="weui-cell weui-cell_select">
            <div class="weui-cell__bd weui-cell_primary">
                <select class="weui-select" name="category">
                    @foreach($categorys as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="weui-cells weui-cell-info">

    </div>
@endsection

@section('my-js')
    <script type="text/javascript">
        getCategory();

        $('.weui-select').change(function (event) {
            getCategory();
        });
        
        function getCategory() {
            var parent_id = $('.weui-select option:selected').val();
            $.ajax({
                type: 'get',
                url: '/service/category/parent_id/' + parent_id,
                dataType: 'json',
                cache: false,
                success: function(data) {
                    if(data == null) {
                        showTopTips('服务端错误');
                        return;
                    }
                    if(data.status != 0) {
                        showTopTips(data.message);
                        return;
                    }

                    $('.weui-cell-info').html('');
                    for (var i=0;i< data.categorys.length; i++) {
                        var next = '/product/category_id/' + data.categorys[i].id;
                        var node = '<a class="weui-cell weui-cell_access" href="' + next + '">' +
                                        '<div class="weui-cell__bd">' +
                                        '<p>' + data.categorys[i].name +  '</p>' +
                                    '</div>' +
                                    '<div class="weui-cell__ft">' +
                                    '</div>'+
                                    '</a>';
                        $('.weui-cell-info').append(node);
                    }

                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }
    </script>
@endsection