<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@glidejs/glide"></script>
        <link href="{{ asset('css/glide.core.css') }}" rel="stylesheet">
        <link href="{{ asset('css/glide.theme.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            #wrapper {
                width:1060px;
                margin:0px auto;
            }

            header {
                margin-top: 18px;
                height: 80px;
                border:dashed 1px #999;
                background-color: #FFD700;
            }

            .header-logo {
                float: left;
                margin: auto;
                line-height: 80px;
                border:dashed 1px #999;
                height: 40px;
                width: 50%;
            }

            .header-logo h1 {
                text-align: center;
                line-height: 40px;
            }

            .header-r {
                text-align: right;
                right: 10px;
                top: 18px;
                float: right;
                height: 40px;
                width: 100%;
            }
            
            nav{
                display: block;
                width: 100%;
                margin-bottom: 5px; /**/
                overflow: hidden;   /*おまじない*/
            }

            nav ul{
                list-style: none;
                width: 80%;
                margin-left: 5%;
            }

            nav li{
                width: calc(20% - 2px);
                border-left: 1px solid orange;
                text-align: center;
                float: left;
            }

            nav li:last-child{
                border-right: 1px solid orange;
            }

            nav a{
                display: block;
                text-decoration: none;
                color:#313131;
                font-size: 110%;
                letter-spacing: 5px;
                font-weight: 400;
                line-height: 40px;
            }

            nav a:hover{
                background-color: orange;
                color: #fff;
                transition: 0.5s;
            }

            #r-sidebar {
                float: right;
            }

            .r-sidebar-content {
                text-align: center;
                width: 230px;
                height: 261px;
                margin:10px 0px 10px 10px;
            }
            
            .ads-container {
                float: right;
                width: 230px;
                height: 230px;
                line-height: 230px;
                text-align: center;
                border: dashed 1px #999;
                margin:10px 0px 10px 10px;
                background-color: #00FFFF;
            }

            .content {
                float:left;
                width:790px;
                margin: 0px 10px 10px 10px;
                text-align: center;
            }

            footer {
                border:dashed 1px #999;
                background-color: #F0E68C;
                clear:both;
            }

            footer h1 {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            h2{
                position: relative;
                padding: 0.5em;
                background: #000000;
                color: white;
            }

            h2::before {
                position: absolute;
                content: '';
                top: 100%;
                left: 0;
                border: none;
                border-bottom: solid 15px transparent;
                border-right: solid 20px rgb(149, 158, 155);
            }

            h3 {
                position: relative;
                padding: 0.5em;
                background: #000000;
                color: white;
            }

            h3::before {
                position: absolute;
                content: '';
                top: 100%;
                left: 0;
                border: none;
                border-bottom: solid 15px transparent;
                border-right: solid 20px rgb(149, 158, 155);
            }
        </style>
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div class="header-logo">
                    <h1>ヘッダー</h1>
                </div>
                <div class="header-r links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
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
            <nav>
                <ul>
                    <li><a class=”current” href=”#”>Home</a></li>
                    <li><a href=”#”>Content 1</a></li>
                    <li><a href=”#”>Content 2</a></li>
                    <li><a href=”#”>Content 3</a></li>
                    <li><a href=”#”>Content 4</a></li>
                </ul>
            </nav>
            <div class="content">
                <h2> Latest Movies</h2>
                <div id="latest-movies" class="glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide"><img src="img/movie1.png" width="240px"/></li>
                            <li class="glide__slide"><img src="img/movie2.png" width="240px"/></li>
                            <li class="glide__slide"><img src="img/movie3.png" width="240px"/></li>
                            <li class="glide__slide"><img src="img/movie4.png" width="240px"/></li>
                            <li class="glide__slide"><img src="img/movie5.png" width="240px"/></li>
                        </ul>

                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><<</button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">>></button>
                        </div>
                    </div>
                </div>

                <h2> Recommended Movies</h2>
                <div id="recommended-movies" class="glide">
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="glide__slide"><img src="img/movie3.png" width="240px"/></li>
                            <li class="glide__slide"><img src="img/movie4.png" width="240px"/></li>
                            <li class="glide__slide"><img src="img/movie5.png" width="240px"/></li>
                            <li class="glide__slide"><img src="img/movie1.png" width="240px"/></li>
                            <li class="glide__slide"><img src="img/movie2.png" width="240px"/></li>
                        </ul>

                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><<</button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">>></button>
                        </div>
                    </div>
                </div>
                <div class="title m-b-md">
                    Laravel Home
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
            <div id="r-sidebar">
                <!-- <div class="ads-container">
                    ADS
                </div> -->
                <div class="r-sidebar-content">
                    <h3>Latest Movies</h3>
                </div>
                <div class="r-sidebar-content">
                    <h3>Recommended Movies</h3>
                </div>
                <div class="r-sidebar-content">
                    <h3>Categories</h3>
                </div>
            </div>

            <footer><h1>フッター</h1></footer>
        </div>
        <script src="js/glide.min.js"></script>
        <script>
            var latestGlide = new Glide('#latest-movies', {
                type: 'carousel',
                startAt: 0,
                perView: 3
            })
            latestGlide.mount();

            var recommendedGlide = new Glide('#recommended-movies', {
                type: 'carousel',
                startAt: 0,
                perView: 3
            })
            recommendedGlide.mount();
        </script>

    </body>
</html>
