<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="{{ $keywords }}">
    <meta name="description" content="{{ $desc }}">
    <title>
        {{ $title }}
    </title>
    <link href="/styles.css" rel="stylesheet"></head>

<body>

<div class="container">
    <!--left-->
    <div id="left" class="left">
        <div class="left-content">
            <header>
                <!--image icon-->
                <a href="javascript:;">
                    <img class="img-circle" src="/e9d98afde42cc95609e7fb79a37d195e.svg" alt="icon">
                </a>
                <!--image icon end-->

                <!--h1 title-->
                <h1>
                    <a href="javascript:;">
                        启航-去远方
                    </a>
                </h1>
                <!--h1 title end-->

                <!--contact-->
                <div class="contact">
                    <a href="{{ $github }}">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-github"></use>
                        </svg>
                    </a>
                    <a href="{{ $sina }}">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-weibo"></use>
                        </svg>
                    </a>
                    <a href="mailto:{{ $email }}">
                        <svg class="icon" aria-hidden="true">
                            <use xlink:href="#icon-email"></use>
                        </svg>
                    </a>
                </div>
                <!--contact end-->
            </header>

            <div class="footer">
                <div class="footer-copy">
                    <p>email:<a href="mailto:{{ $email }}">{{ $email }}</a></p>
                    <p>Powered by 周启航 &copy;2017</p>
                    <p><a href="{{ $beianLink }}">{{ $beian }}</a></p>
                </div>
            </div>

        </div>
    </div>
    <!--left end-->

    <!--right-->
    <div id="right" class="right">
        <!--nav-->
        <nav id="nav" class="active">
                <span class="nav-handle">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-ghosts-pacman"></use>
                </svg>
            </span>
            <ul>
                <li><a href="/">首页</a></li>
                @foreach($menus as $menu)
                    <li><a href="{{ route('home', ['menu' => $menu->label_id]) }}">{{ $menu->title }}</a></li>
                @endforeach
            </ul>
        </nav>
        <!--nav end-->

        @yield('content')

        <!--footer-->
        <footer>
            <p>Powered by 周启航 &copy;2017</p>
            <p>email:<a href="mailto:{{ $email }}">{{ $email }}</a></p>
            <p><a href="{{ $beianLink }}">{{ $beian }}</a></p>
        </footer>
        <!--footer end-->
    </div>
    <!--right end-->
</div>

<!--icon font-->
<script src="//at.alicdn.com/t/font_tpmurnt2p7lanhfr.js"></script>
<!--jquery-->
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="/vendor.js"></script>

@section('script')

@show
</body>

</html>