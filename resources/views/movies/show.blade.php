@extends('layouts/app')
@section('content')
    <style>
        .agreeBtn {
            margin-top: 20px;
            border-radius: 4px;
            width: 100px;
            display: inline-block;
            text-align: center;
        }

        .disagreeBtn {
            border-radius: 4px;
            width: 100px;
            display: inline-block;
            text-align: center;
        }
        .movie-detail-wrapper {
            width: 98%;
            height: 500px;
            margin: 5px;
            border: 1px solid gray;
        }

        .movie-title {
            font-size: 36px;
            font-weight: 400;
            margin: 5px;
            color: white;
        }

        .video-container {
            float: left;
            width: 50%;
            margin-left: 10px;
            align-text: center;
        }

        .video-container iframe,
        .video-container object,
        .video-container embed {
            top: 0;
            left: 0;
            width: 100%;
            height: 400px;
        }

        .movie-detail-description {
            border: 1px solid gray;
            color: white;
            float: right;
            font-size: 20px;
            margin: 0 10px 10px 10px;
            padding: 5px;
            width: 45%;
        }

        .textlines {
            border: 2px solid #E76816;  /* 枠線 */
            border-radius: 0.67em;   /* 角丸 */
            padding: 0.5em;          /* 内側の余白量 */
            background-color: snow;  /* 背景色 */
            width: 65em;             /* 横幅 */
            height: 120px;           /* 高さ */
            font-size: 1em;          /* 文字サイズ */
            line-height: 1.2;        /* 行の高さ */
            /*float: right;*/
        }

        .post-review-comment {
            clear: left;
            width: 300px;
        }

        .post-review-avatar-image {

        }

        .movie-reviewed-comment {
            clear: left;
        }
        .reviewed-comment-list {
            width: 98%;
        }
        .reviewed-user-avatar {
            margin: 10px;
            width: 10%;
            text-align: center;
            color: #00FFFF;
            float: left;
            clear: left;
        }
        .reviewed-user-name {
            text-align: center;
        }
        .reviewed-comment-box {
            position: relative;
            padding: 8px 15px;
            background: #fff0c6;
            border-radius: 30px;
            height: 60px;
            width: 75%;
            float: left;
            margin: 25px 0 0 30px;
        }
        .reviewed-comment-box:before{font-family: FontAwesome;
            content: "\f111";
            position: absolute;
            font-size: 15px;
            left: -40px;
            bottom: 0;
            color: #fff0c6;
        }
        .reviewed-comment-box:after{
            font-family: FontAwesome;
            content: "\f111";
            position: absolute;
            font-size: 23px;
            left: -23px;
            bottom: 0;
            color: #fff0c6;
        }
        .reviewed-comment-box p {
            margin: 0;
            padding: 0;
        }
        .reviewed-comment-date {
            text-align: right;
        }

        hr {
            border-width: 1px 0px 0px 0px;
            border-style: solid;
            border-color: gray;
            height: 2px;
        }

    </style>

        <div class="movie-detail-wrapper">
            <div class="movie-title">{{ $movie->title }}</div>
            {{--<div class="movie-released-at">Released at {{ $movie->released_at }}</div>--}}
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/{{ $movie->youtube_id }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="movie-detail-description">
                <h4>Movie Summary</h4>
                <p>{{ $summary }}</p>
            </div>
        </div>
        <div class="post-review-comment">
            {{--@if(!Auth::check())--}}
                {{--<form method="post" action="/reviewMovies/postReview">--}}
                    {{--{{ csrf_field() }}--}}
                    {{--<div class="form-group row">--}}
                        {{--<div class="offset-sm-3 col-sm-9">--}}
                            {{--<button type="submit" class="btn btn-primary">Write Review</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--@else--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="post-review-avatar-image">
                    {!! Html::image('img/himakuro.png', 'avatar-image', array( 'width' => 200, 'height' => 200 )) !!}
                </div>
                <div class="post-review-comment-content">
                    <form method="post" action="/reviewMovies/postReview">
                        {{ csrf_field() }}
                        <input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">
                        <textarea class="textlines" name="reviewText" placeholder="Your Review"></textarea>
                        <div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            {{--@endif--}}
        </div>
        <hr></hr>
        <h3>Reviewed Comments</h3>
        <div class="reviewed-comment-list">
            @forelse ($reviews as $review)
                <div class="movie-reviewed-comment">
                    <div class="reviewed-user-avatar">
                        {!! Html::image('img/himakuro.png', 'avatar-image', array( 'width' => 100, 'height' => 100 )) !!}
                        <div class="reviewed-user-name">
                            {{ $review->username }}
                        </div>
                    </div>
                    <div class="reviewed-comment-box">
                        <p>{{ $review->review_content }}</p>
                        <p class="reviewed-comment-date">{{ $review->updated_at }}</p>
                    </div>
                    <input type="hidden" name="movie_id" value="{{ $movie->movie_id }}">
                    @if ($viewer_id != -1)
                        {{-- id => id of user who posted the review --}}
                        <input type="button" value="AGREE ⤴" class="agreeBtn" id="{{ $review->user_id }}">
                        <input type="button" value="DISAGREE ⤵" class="disagreeBtn" id="{{ $review->user_id }}">
                    @endif
                </div>
            @empty
                <p>No reviews</p>
            @endforelse
        </div>

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

