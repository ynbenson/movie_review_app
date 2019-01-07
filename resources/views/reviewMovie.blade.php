@extends('layouts.app')

@section('navi')
@endsection

@section('contents')
    <style>
        body{
            display: flex;
            flex-direction: column;
        }
        main{
            display: flex;
            min-height: 60vh;
            margin: 10px 0 10px 0;
            right: 0px;
        }

        .content-area{
            width: 45%;
            float: right;
            border: 1px solid #000000;
        }
        .movie-content{
            width: 42%;
            float:left;
            height: 200px;
            background-color: #eee;
            text-align: center;
            margin: 0 10px 0 10px;
            border: 1px solid #000000;
        }
        .localNavigation{
            text-align: center;
            background-color: #888;
            color: #fff;
            width: 500px;
            float: left;
        }
        
        .video-container {
            position: relative;
            padding-bottom: 75%;
            padding-top: 30px; height: 0; overflow: hidden;
        }
        
        .video-container iframe,
        .video-container object,
        .video-container embed {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        
        .square_btn{
            display: inline-block;
            padding: 0.5em 1em;
            background: #f7f7f7;
            border-left: solid 6px #ff7c5c;/*左線*/
            color: #ff7c5c;/*文字色*/
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.29);
        }

        .square_btn:active {
            box-shadow: inset 0 0 2px rgba(128, 128, 128, 0.1);
            transform: translateY(2px);
        }
        
        .btn_exc {
            background: #f7f7f7;
            border-left: solid 6px #009900;/*左線*/
            color: #009900;/*文字色*/
        }
        
        .btn_great {
            background: #f7f7f7;
            border-left: solid 6px #66ccff;/*左線*/
            color: #66ccff;/*文字色*/
        }
        
        .btn_ok {
            background: #f7f7f7;
            border-left: solid 6px gray;/*左線*/
            color: gray;/*文字色*/
        }
        
        .btn_poor {
            background: #f7f7f7;
            border-left: solid 6px #ff7c5c;/*左線*/
            color: #ff7c5c;/*文字色*/
        }        
        
        .btn_awful {
            background: #f7f7f7;
            border-left: solid 6px #ff3333;/*左線*/
            color: #ff3333;/*文字色*/
        }
        
        #outer
        {
            width:100%;
            text-align: center;
        }
        
        .inner
        {
            display: inline-block;
            margin: 5px 30px 5px 30px;
        }
    </style>
    <body>
        <h3>{{ $movie->title }}</h3>
        <p>Released at {{ $movie->released_at }}</p>
        <main>      
            
            <div class="localNavigation">
                <div class="video-container">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $movie->youtube_id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        
            <div class="content-area">
                <div class="movie-content">
                    {!! Html::image('img/movie'.$movie->movie_id.'/1.jpg', 'movie_img1', array( 'width' => 220, 'height' => 200 )) !!}
                </div>
                <div class="movie-content">
                    {!! Html::image('img/movie'.$movie->movie_id.'/2.jpg', 'movie_img2', array( 'width' => 220, 'height' => 200 )) !!}
                </div>
                <div class="movie-content">
                    {!! Html::image('img/movie'.$movie->movie_id.'/3.jpg', 'movie_img3', array( 'width' => 220, 'height' => 200 )) !!}
                </div>
                <div class="movie-content">
                    {!! Html::image('img/movie'.$movie->movie_id.'/4.jpg', 'movie_img4', array( 'width' => 220, 'height' => 200 )) !!}
                </div>
            </div>

        </main>
    </body>
@endsection

{{-- buttons for reviewing --}}
@section('footer')

{!! Form::open(['route' => 'ReviewMovies.rateMovies']) !!}
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">
<div id="outer">
    <div class="inner">
        <button type='submit' class='square_btn btn_exc' name='btn' value='exc'>Excellent</button>
    </div>
    <div class="inner">
        <button type='submit' class='square_btn btn_great' name='btn' value='great'>Great</button>
    </div>
    <div class="inner">
        <button type='submit' class='square_btn btn_ok' name='btn' value='ok'>OK</button>
    </div>
    <div class="inner">
        <button type='submit' class='square_btn btn_poor' name='btn' value='poor'>Poor</button>
    </div>
    <div class="inner">
        <button type='submit' class='square_btn btn_awful' name='btn' value='awful'>Awful</button>
    </div>
</div>
{!! Form::close() !!}

{{--
<div id="outer">
  <div class="inner"><button type="submit" class="square_btn">Interested in watching it!</button></div>
  <div class="inner"><button type="submit" class="square_btn">Later</button></div>
  <div class="inner"><button type="submit" class="square_btn">Not interested at all</button></div>
</div>
--}}
@endsection