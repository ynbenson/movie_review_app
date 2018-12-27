<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Home</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

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
                width:960px;
                margin:0px auto;
            }

            header {
                margin-top: 18px;
                border:dashed 1px #999;
                background-color: #FFD700;
            }

            .header-r {
                text-align: right;
                right: 10px;
                top: 18px;
                float: right;
                height: 40px;
                width: 100%;
            }
            
            header h1 {
                text-align: center;
            }
            
            #l-sidebar {
                float: left;
                width: 180px;
                height:498px;
                border:dashed 1px #999;
                margin:10px 10px 10px 0px;
            }

            #r-sidebar {
                float: right;
                text-align: end;
                width: 216px;
                height: 261px;
                border:dashed 1px #999;
                margin:10px 0px 10px 10px;
            }
            
            .ads-container {
                float: right;
                width: 216px;
                height: 216px;
                line-height: 216px;
                text-align: center;
                border:dashed 1px #999;
                margin:10px 0px 10px 10px;
                background-color: #00FFFF;
            }

            .content {
                float:left;
                width:520px;
                height:498px;
                border:dashed 1px #999;
                margin:10px 0px 10px 0px;
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
        </style>
    </head>
    <body>
        <div id="wrapper">
            <header>
                <div class="header-r links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                        <a href="{{ route('logout') }}">Logout</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
                <h1>ヘッダー</h1>
            </header>

            <div id="l-sidebar">
                a
            </div>
            <div class="content">
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
            <div class="ads-container">
                ADS
            </div>
            <div id="r-sidebar">
                b
            </div>
            <footer><h1>フッター</h1></footer>
        </div>
    </body>
</html>
