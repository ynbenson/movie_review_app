
@extends('layouts/app')

@section('navi')
@endsection

@section('content')
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
        
        .textlines {
            border: 2px solid #E76816;  /* 枠線 */
            border-radius: 0.67em;   /* 角丸 */
            padding: 0.5em;          /* 内側の余白量 */
            background-color: snow;  /* 背景色 */
            width: 40em;             /* 横幅 */
            height: 80px;           /* 高さ */
            font-size: 1em;          /* 文字サイズ */
            line-height: 1.2;        /* 行の高さ */
        }
        
        
        .agree_active{
            border: 1px solid #ccffcc;
            background: #ccffcc;
            text-decoration: none;
        }
        
        .disagree_active{
            border: 1px solid #ff6666;
            background: #ff6666;
        }

        .agreeBtn, .disagreeBtn{  
            border-radius: 4px;
            width: 100px;
            display: inline-block;
            text-align: center;
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


@section('footer')
    <h4>Movie Summary</h4>
    <p>{{ $summary }}</p>
    @if(!Auth::check())
        <form method="post" action="/reviewMovies/postReview">
            {{ csrf_field() }}

            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Write Review</button>
                </div>
            </div>
        </form>
    @else
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="/reviewMovies/postReview">
            {{ csrf_field() }} 
            <input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">
            <p><textarea class="textlines" name="reviewText" placeholder="Your Review"></textarea></p>  
            <div class="offset-sm-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    @endif
    
    @forelse ($reviews as $review)

        <li>{{ $review->username }} : {{ $review->review_content }} {{ $review->updated_at }}</li>
        <input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">
        @if ($viewer_id != -1)
        <div class="offset-sm-3 col-sm-9">
            {{-- id => id of user who posted the review --}}
            <input type="button" value="AGREE ⤴" class="agreeBtn" id="{{ $review->user_id }}"> 
            <input type="button" value="DISAGREE ⤵" class="disagreeBtn" id="{{ $review->user_id }}">
        </div>
        @endif

    @empty
        <p>No reviews</p>
    @endforelse

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>

	$(".agreeBtn").click(function() {
            $(this).toggleClass('agree_active');
            
            var json1 = {
                "reviewer_id": Number($(this).attr("id")),
                "movie_id": {{ $movie->movie_id }},
            };

            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
        
            $.ajax({	
                    url:"/movies/agree",
                    type:"post",
                    contentType: "application/json",
                    data:JSON.stringify(json1),
                    dataType:"json",
                    }).done(function(data1,textStatus,jqXHR) {
                    }); 
        });

    
    
    $(".disagreeBtn").click(function() {
        $(this).toggleClass('disagree_active');

        var json1 = {
            "reviewer_id": Number($(this).attr("id")),
            "movie_id": {{ $movie->movie_id }},
        };

        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });

        $.ajax({	
                url:"/movies/disagree",
                type:"post",
                contentType: "application/json",
                data:JSON.stringify(json1),
                dataType:"json",
                }).done(function(data1,textStatus,jqXHR) {
                }); 
    });
//    $(function() {
//	$(".disagreeBtn").click(function() {
//            $(this).toggleClass('disagree_active');
//            
//            var json1 = {
//                "reviewer_id": Number($(this).attr("id")),
//                "movie_id": {{ $movie->movie_id }},
//            };
//
//            $.ajaxSetup({
//                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
//            });
//        
//            $.ajax({	
//                    url:"/movies/disagree",
//                    type:"post",
//                    contentType: "application/json",
//                    data:JSON.stringify(json1),
//                    dataType:"json",
//                    }).done(function(data1,textStatus,jqXHR) {
//                    }); 
//    });


//function change_agree()
//{
//    var elem = document.getElementById("agreeBtn");
//    if (elem.value==="AGREE ⤴"){
//        elem.value = "AGREED";
//        document.getElementById("disagreeBtn").disabled = true;
//    }
//    else {
//        elem.value = "AGREE ⤴";
//        document.getElementById("disagreeBtn").disabled = false;
//    }
//}
//
//function change_disagree() 
//{
//    var elem = document.getElementById("disagreeBtn");
//    if (elem.value==="DISAGREE ⤵") {
//        elem.value = "DISAGREED";
//        document.getElementById("agreeBtn").disabled = true;
//    }
//    else {
//        elem.value = "DISAGREE ⤵";
//        document.getElementById("agreeBtn").disabled = false;
//    }
//}
</script>

@endsection 

