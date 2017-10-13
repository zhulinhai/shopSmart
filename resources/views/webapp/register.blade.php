@extends('master')

@section('title', '注册')

@section('content')
    @include('component.loading')

    <div class="page__bd">
        <div class="weui-cells__title">注册方式</div>
        <div class="weui-cells weui-cells_radio">
            <label class="weui-cell weui-check__label" for="x11">
                <div class="weui-cell__bd">
                    <p>手机号注册</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" class="weui-check" name="register_type" id="x11"  checked="checked"/>
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
            <label class="weui-cell weui-check__label" for="x12">
                <div class="weui-cell__bd">
                    <p>邮箱注册</p>
                </div>
                <div class="weui-cell__ft">
                    <input type="radio" name="register_type" class="weui-check" id="x12" />
                    <span class="weui-icon-checked"></span>
                </div>
            </label>
        </div>

        <div class="weui-cells__title"></div>
        <div class="weui-cells weui-cells_form"  style="display: block">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">手机号</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="tel" placeholder="" name="phone"/>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">密码</label>
                </div>
                <div class="weui-cell__bd weui_cell__primary">
                    <input class="weui-input" type="password" placeholder="不少于6位" name="passwd_phone"/>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">确认密码</label>
                </div>
                <div class="weui-cell__bd weui_cell__primary">
                    <input class="weui-input" type="password" placeholder="不少于6位" name="passwd_phone_cfm"/>
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">手机验证码</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="number" placeholder="" name="phone_code"/>
                </div>
                <div class="weui-cell__ft">
                    <p class="bk_important bk_phone_code_send">发送验证码</p>
                </div>
            </div>
        </div>
        <div class="weui-cells weui-cells_form" style="display: none">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">邮箱</label></div>
                <div class="weui-cell__bd">
                    <input class="weui-input" type="tel" placeholder="" name="email" />
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">密码</label>
                </div>
                <div class="weui-cell__bd weui_cell__primary">
                    <input class="weui-input" type="password" placeholder="不少于6位" name="passwd_email" />
                </div>
            </div>
            <div class="weui-cell">
                <div class="weui-cell__hd">
                    <label class="weui-label">确认密码</label>
                </div>
                <div class="weui-cell__bd weui_cell__primary">
                    <input class="weui-input" type="password" placeholder="不少于6位" name="passwd_email_cfm" />
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
            <a class="weui-btn weui-btn_primary" href="javascript:" onclick="onRegisterClick();">注册</a>
        </div>
        <a href="/login"><p class="bk_bottom_tips">已有账号？去登录</p></a>
    </div>

@endsection

@section('my-js')
    <script type="text/javascript">
        var registerType = 0;
        $('input:radio[name=register_type]').click(function () {
            var id = $(this).attr('id');
            var $cellForm = $('.weui-cells_form');
            if (id === 'x11') {
                registerType = 0;
                $cellForm.eq(0).show();
                $cellForm.eq(1).hide();
            } else if (id === 'x12' ) {
                registerType = 1;
                $cellForm.eq(1).show();
                $cellForm.eq(0).hide();
            }
        });

        $('.bk_validate_code').click(function(){
            $(this).attr('src', '/service/validate_code/create?random=' + Math.random());
        });

        var enable = true;
        $('.bk_phone_code_send').click(function (event) {
            // 发送验证码
            if (enable == false) {
                return;
            }

            var phone = $('input[name=phone]').val();
            // 手机号不为空
            if(phone == '') {
                showTopTips('请输入手机号');
                return;
            }
            // 手机号格式
            if(phone.length != 11 || phone[0] != '1') {
                showTopTips('手机格式不正确');
                return;
            }

            $(this).removeClass('bk_important');
            $(this).addClass('bk_summary');
            enable = false;
            var num = 60;
            var that = this;
            var interval = window.setInterval(function () {
                $(that).html(--num + 's 重新发送');
                if (num == 0) {
                    enable = true;
                    window.clearInterval(interval);
                    interval = -1;
                    $(that).addClass('bk_important');
                    $(that).removeClass('bk_summary');
                    $(that).html('重新发送');
                }

            }, 1000);

            $.ajax({
                url: '/service/validate_phone/send',
                type: 'post',
                dataType: 'json',
                cache: false,
                data: {phone: phone, _token: "{{csrf_token()}}"},
                success: function (data) {
                    if(data == null) {
                        showTopTips('服务端错误');
                        return;
                    }
                    if(data.status != 0) {
                        showTopTips(data.message);
                        return;
                    }
                    showTopTips('发送成功');
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }

            })
        });
    </script>
    <script type="text/javascript">

        function onRegisterClick() {
            var email = '';
            var phone = '';
            var password = '';
            var confirm = '';
            var phone_code = '';
            var validate_code = '';
            if (registerType == 0) {
                phone = $('input[name=phone]').val();
                password = $('input[name=passwd_phone]').val();
                confirm = $('input[name=passwd_phone_cfm]').val();
                phone_code = $('input[name=phone_code]').val();
                if(verifyPhone(phone, password, confirm, phone_code) == false) {
                    return;
                }
            } else {
                email = $('input[name=email]').val();
                password = $('input[name=passwd_email]').val();
                confirm = $('input[name=passwd_email_cfm]').val();
                validate_code = $('input[name=validate_code]').val();
                if(verifyEmail(email, password, confirm, validate_code) == false) {
                    return;
                }
            }

            $.ajax({
                type: 'post',
                url: '/service/register',
                dataType: 'json',
                cache: false,
                data: {phone: phone, email: email, password: password, confirm: confirm,
                    phone_code: phone_code, validate_code: validate_code, _token: "{{csrf_token()}}"},
                success: function(data) {
                    if(data == null) {
                        showTopTips('服务端错误');
                        return;
                    }
                    if(data.status != 0) {
                        showTopTips(data.message);
                        return;
                    }
                    showTopTips('注册成功');

                    window.location.href = '/login';
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        }

        function verifyPhone(phone, password, confirm, phone_code) {
            // 手机号不为空
            if(phone == '') {
                showTopTips('请输入手机号');
                return false;
            }
            // 手机号格式
            if(phone.length != 11 || phone[0] != '1') {
                showTopTips('手机格式不正确');
                return false;
            }
            if(password == '' || confirm == '') {
                showTopTips('密码不能为空');
                return false;
            }
            if(password.length < 6 || confirm.length < 6) {
                showTopTips('密码不能少于6位');
                return false;
            }
            if(password != confirm) {
                showTopTips('两次密码不相同');
                return false;
            }
            if(phone_code == '') {
                showTopTips('手机验证码不能为空!');
                return false;
            }
            if(phone_code.length != 6) {
                showTopTips('手机验证码为6位!');
                return false;
            }
            return true;
        }

        function verifyEmail(email, password, confirm, validate_code) {
            // 邮箱不为空
            if(email == '') {
                showTopTips('请输入邮箱');
                return false;
            }
            // 邮箱格式
            if(email.indexOf('@') == -1 || email.indexOf('.') == -1) {
                showTopTips('邮箱格式不正确');
                return false;
            }
            if(password == '' || confirm == '') {
                showTopTips('密码不能为空');
                return false;
            }
            if(password.length < 6 || confirm.length < 6) {
                showTopTips('密码不能少于6位');
                return false;
            }
            if(password != confirm) {
                showTopTips('两次密码不相同');
                return false;
            }
            if(validate_code == '') {
                showTopTips('验证码不能为空!');
                return false;
            }
            if(validate_code.length != 4) {
                showTopTips('验证码为4位!');
                return false;
            }
            return true;
        }

    </script>

@endsection
