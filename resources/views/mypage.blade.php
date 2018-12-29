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

            #mypage-profile {
                float: left;
                width: 25%;
                margin: 0px 10px 10px 10px;
                text-align: center;
            }

            #mypage-profile img{
                align: center;
            }

            #mypage-content {
                float: right;
                width: 70%;
                margin: 0px 10px 10px 10px;
            }
            #mypage-icon {
                width: 65%;
                margin: 0px 10px 10px 10px;
            }

            #mypage-username {
                color: green;
                text-align: center;
                margin: 0px 10px 10px 10px;
            }

            #mypage-content h2 {
                position: relative;
                padding-left: 25px;
                text-align: left;
            }

            #mypage-content h2:before {
                position: absolute;
                content: '';
                bottom: -3px;
                left: 0;
                width: 0;
                height: 0;
                border: none;
                border-left: solid 15px transparent;
                border-bottom: solid 15px rgb(0, 0, 0);
            }
            #mypage-content h2:after {
                position: absolute;
                content: '';
                bottom: -3px;
                left: 10px;
                width: 100%;
                border-bottom: solid 3px rgb(0, 0, 0);
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
                <div id="mypage-profile">
                    <div id="mypage-icon">
                        <img src="img/himakuro.png" width="240px"/>
                    </div>
                    <div id="mypage-username">test user name</div>
                </div>

                <div id="mypage-content">
                    <h2>Analytics</h2>
                        <p>(円グラフ表示したい)</p>
                        <p>Reviewed Movie Count: 123456</p>
                        <p>LOVED IT!: 123456</p>
                        <p>GOOD!: 123456</p>
                        <p>OK: 123456</p>
                        <p>BAD!: 123456</p>
                        <p>SUCKED!: 123456</p>
                    <h2>Recently Reviewed Movies</h2>
                        aaaa
                    <h2>Recommended Movies</h2>
                        aaaa
                    <h2>Following</h2>
                        aaaa
                    <h2>Followers</h2>
                        aaaa
                </div>
            </div>

            <footer><h1>フッター</h1></footer>
        </div>
    </body>
</html>
