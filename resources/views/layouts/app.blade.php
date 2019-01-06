

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

</head>
<body>
    <div id="wrapper">
        <header>
            <div class="header-logo">
                <a href="{{ route('home') }}"><img src="img/header-logo.png"/></a>
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
        @section('contents')
            base
        @show
        @section('navi')
        <nav>
            <ul>
                
                <li><a href="mypage">Mypage</a></li>
                <li><a href=search>Search</a></li>
                <li><a href=ranking>Ranking</a></li>
            @auth
                <li><a href=reviewMovies>Matcher</a></li>
            @else
                <li><a href="#">Content 4</a></li>
            @endauth
                <li><a href="#">Content 5</a></li>
            </ul>
        </nav>
        @show
        @section('footer')
        <footer><h1>フッター</h1></footer>
        @show
    </div>
</body>
</html>
