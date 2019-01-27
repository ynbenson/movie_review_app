

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glide.core.css') }}" rel="stylesheet">
    <link href="{{ asset('css/glide.theme.css') }}" rel="stylesheet">

    <style>
        .overlay {
            content: "";
            display: block;
            width: 0;
            height: 0;
            background-color: rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
            opacity: 0;
            transition: opacity .5s;
        }
        .overlay.open {
            width: 100%;
            height: 100%;
            opacity: 1;
        }
        main {
            height: 100%;
            min-height: 100vh;
            padding: 0 50px;
            background-color: #eee;
            transition: all .5s;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        main.open {
            transform: translateX(-250px);
        }
        main h1 {
            text-align: center;
            font-weight: 500;
        }
        main p {
            text-align: center;
        }
        .menu-trigger {
            float: left;
            line-height: 35px;
            position: relative;
            font-weight: bold;
            padding: 0.5em 1em;
            display: inline-block;
            width: 36px;
            height: 28px;
            vertical-align: middle;
            cursor: pointer;
            top: 10px;
            left: 10px;
            z-index: 100;
            /*transform: translateX(0);*/
            /*transition: transform .5s;*/
        }
        /*.menu-trigger.active {*/
          /*transform: translateX(-250px);*/
        /*}*/
        .menu-trigger:hover {
            background: -webkit-repeating-linear-gradient(-45deg, #cce7ff, #cce7ff 5px,#e9f4ff 5px, #e9f4ff 9px);
            background: repeating-linear-gradient(-45deg, #cce7ff, #cce7ff 5px,#e9f4ff 5px, #e9f4ff 9px);
        }

        .menu-trigger span {
               display: inline-block;
               box-sizing: border-box;
               position: absolute;
               left: 0;
               width: 100%;
               height: 4px;
               background-color: #000;
               transition: all .5s;
           }
        .menu-trigger.active span {
            background-color: #fff;
        }
        .menu-trigger span:nth-of-type(1) {
            top: 0;
        }
        .menu-trigger.active span:nth-of-type(1) {
            transform: translateY(12px) rotate(-45deg);
        }
        .menu-trigger span:nth-of-type(2) {
            top: 12px;
        }
        .menu-trigger.active span:nth-of-type(2) {
            opacity: 0;
        }
        .menu-trigger span:nth-of-type(3) {
            bottom: 0;
        }
        .menu-trigger.active span:nth-of-type(3) {
            transform: translateY(-12px) rotate(45deg);
        }

        nav {
            width: 205px;
            height: 100%;
            padding-top: 20px;
            background-color: #1b1e21;
            position: fixed;
            left: 0;
            z-index: 10;
            transform: translate(-250px);
            transition: all .5s;
        }
        nav.open {
            transform: translateZ(0);
        }

        ul {
            padding-inline-start: 0px;
        }

        nav li {
            list-style: none;
            font-weight: 600;
            text-align: left;
            padding: 10px 0 15px 25px;
            border-bottom: 1px solid #292929;
        }

        nav li a {
            color: white;
        }

        /*nav li a {*/
            /*color: white;*/
        /*}*/

        nav li a:hover {
            color: gray;
        }

    </style>
</head>
<body>
    <div id="wrapper">
        <header>
            <div class="menu-trigger" href="">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="overlay"></div>
            <div class="header-logo">
                <a href="{{ route('home') }}">
                    <img src="{{ URL::to('/') }}/img/header-logo.png" alt="header-logo.png" />
                </a>  
            </div>
            <div class="header-r links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                    {{-- class="dropdown-item" (logout押せないから一時的に退避) --}}
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        </header>
        @section('content')
        @show
        @section('navi')
        <nav>
            <ul>
                
                <li><a href="mypage">■ Mypage</a></li>
                <li><a href=search>■ Search</a></li>
                <li><a href=ranking>■ Ranking</a></li>
            @auth
                <li><a href=reviewMovies>■ Matcher</a></li>
                <li><a href="{{ route('movies.index') }}">■ Movies</a></li>
                <li><a href="{{ route('user.recommendUser') }}">■ Recommend Users</a></li>
            @else
                <li><a href="#">Content 4</a></li>
                <li><a href="#">Content 5</a></li>
            @endauth
            </ul>
        </nav>
        @show
        @section('footer')
        <footer><h1>フッター</h1></footer>
        @show
    </div>

    <script>
        $('.menu-trigger').on('click',function(){
            if($(this).hasClass('active')){
                $(this).removeClass('active');
                $('main').removeClass('open');
                $('nav').removeClass('open');
                $('.overlay').removeClass('open');
            } else {
                $(this).addClass('active');
                $('main').addClass('open');
                $('nav').addClass('open');
                $('.overlay').addClass('open');
            }
        });
        $('.overlay').on('click',function(){
            if($(this).hasClass('open')){
                $(this).removeClass('open');
                $('.menu-trigger').removeClass('active');
                $('main').removeClass('open');
                $('nav').removeClass('open');
            }
        });
    </script>
</body>
</html>
