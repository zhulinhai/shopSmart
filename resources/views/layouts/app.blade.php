<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <script src="https://cdn.bootcss.com/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container-fluid">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{--{{ config('app.name', 'Laravel') }}--}}
                        <img class="logo" src="{{ asset('img/logo.png') }}" />
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        {{--&nbsp;<img class="logo" src="{{ asset('img/logo.png') }}" />--}}
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a  style="color: #fff" href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> 登录</a></li>
                            <li><a  style="color: #fff" href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span> 注册</a></li>
                        @else
                            <li class="dropdown">
                                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
                                    {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
                                {{--</a>--}}

                                <a style="color: #fff" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="glyphicon glyphicon-cog"></i> 账号退出</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>


                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="notice"><img src="{{ asset('img/currentUser.png') }}"> {{ '李小明' }} 欢迎您进入智慧商圈后台管理系统 <img src="{{ asset('img/clock.png') }}"> {{ date(DATE_ATOM) }}</div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                @yield('menu')
                <div class="col-sm-9 col-md-10 content">
                    @yield('content')
                </div>
            </div>
        </div>
        <div class="footer"> 武汉云端物联科技有限公司 · 版权所有&nbsp;&nbsp;</div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
