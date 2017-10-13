@extends('master')

@section('title', '登录')

@section('content')
    @include('component.loading')

    <div class="page__hd">
        <div class="weui_cells_title"></div>
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">账号</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="邮箱或手机号" name="username"/>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">密码</label>
                </div>
                <div class="weui-cell__bd weui_cell__primary">
                    <input class="weui-input" type="password" placeholder="不少于6位" name="password"/>
                </div>
            </div>
            <div class="weui-cell weui-cell_vcode">
                <div class="weui-cell__hd"><label class="weui-label">验证码</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="text" placeholder="请输入验证码" name="validate_code" />
                </div>
                <div class="weui-cell__ft">
                    <img class="bk_validate_code" src="/service/validate_code/create" />
                </div>
            </div>
        </div>
        <div class="weui-btn-area">
            <a class="weui-btn weui-btn_primary" href="javascript:" onclick="onLoginClick();">登录</a>
        </div>
        <a href="/register"><p class="bk_bottom_tips">没有账号？去注册</p></a>
    </div>
@endsection

@section('my-js')
    <script type="text/javascript">
        $('.bk_validate_code').click(function(){
            $(this).attr('src', '/service/validate_code/create?random=' + Math.random());
        });

        function onLoginClick() {
            var username = $('input[name=username]').val();
            if (username.length == 0) {
                showTopTips('账号不能为空');
                return;
            }

            if (username.indexOf('@') == -1) {
                if (username.length != 11 || username[0] != 1) {
                    showTopTips('账号格式不对');
                    return;
                }
            } else {
                if (username.indexOf('.') == -1) {
                    showTopTips('账号格式不对');
                    return;
                }
            }

            var password = $('input[name=password]').val();
            if(password == '') {
                showTopTips('密码不能为空');
                return;
            }
            if(password.length < 6) {
                showTopTips('密码不能少于6位');
                return;
            }
            var validate_code = $('input[name=validate_code]').val();
            if(validate_code == '') {
                showTopTips('验证码不能为空!');
                return false;
            }
            if(validate_code.length != 4) {
                showTopTips('验证码为4位!');
                return false;
            }

            $.ajax({
                type: 'POST',
                url: '/service/login',
                dataType: 'json',
                cache: false,
                data: {username: username, password: password, validate_code: validate_code, _token: "{{csrf_token()}}"},
                success: function(data) {
                    if(data == null) {
                        showTopTips('服务端错误');
                        return;
                    }
                    if(data.status != 0) {
                        showTopTips(data.message);
                        return;
                    }
                    showTopTips('登录成功');

                    var return_url = "{!! $return_url !!}";
                    location.href = return_url==''?'/category':return_url;
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
