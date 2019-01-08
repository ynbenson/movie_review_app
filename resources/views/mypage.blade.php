@extends('layouts/app')
@section('contents')
<style>
    #mypage-chart-wrapper {
        width: 100%;
    }
    .mypage-chart {
        float:left;
        width: 50%;
        text-align: center;
    }

    #ranking-content {
        float: right;
        width: 71%;
        border: 1px solid #FFF;
        margin: 20px 10px 10px 10px;
    }

    #ranking-content h2{
        color: #FFFAFA;
    }

    #mypage-reviewed-movies {
        padding-bottom: 15px;
    }
    .tab_item {
        display: inline-block;
        text-decoration :none;
        background: #87b9eb;
        box-shadow: 0 2px 2px rgba(0,0,0,0.4), 0 -4px 5px -2px #6d95ce inset;
        border-radius: 2px;
        transition: .3s;
    }

    .tab_item:hover{
        box-shadow: 0 1px 1px rgba(0,0,0,0.2);
        background-color: #ADFF2F;
        transition: 0.5s;
    }

    .movie-search-result-description {
        margin: 3px 10px 5px 20px;
        float: right;
    }

    .movie-search-result img {
        width: 50%;
        height: 150px;
        float: left;
    }

    .most-reviewed-user-ranking {
        width: 100%;
        margin: 5px 10px 5px 10px;
    }

    .most-reviewed-user-ranking img {
        width: 20%;
    }

    .most-reviewed-user-ranking-description {
        float: right;
        width: 75%;
    }

    .popular-user-ranking {
        width: 100%;
        margin: 5px 10px 5px 10px;
        padding-bottom: 10px;
    }

    .popular-user-ranking img {
        width: 20%;
    }

    .popular-user-ranking-description {
        float: right;
        width: 75%;
    }

    .ranking-tabs {
        padding-bottom: 40px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 100%;
        margin: 0 0 0 0;
    }

    .tab_item {
        width: calc(100%/3);
        height: 50px;
        background-color: #141414;
        line-height: 50px;
        font-size: 16px;
        text-align: center;
        color: #FFF;
        display: block;
        float: left;
        text-align: center;
        font-weight: bold;
        transition: all 0.2s ease;
    }

    .tab_item:hover {
        opacity: 0.75;
    }

    input[name="tab_item"] {
        display: none;
    }

    .tab_content {
        display: none;
        padding: 20px 40px 0;
        clear: both;
        overflow: hidden;
    }

    #mypage-overview-tab:checked ~ #mypage-overview-tab-content,
    #mypage-movie-tab:checked ~ #mypage-movie-tab-content,
    #mypage-follow-tab:checked ~ #mypage-follow-tab-content {
        display: block;
    }

    .tabs input:checked + .tab_item {
        background-color: #5ab4bd;
        color: #fff;
    }
</style>
<div id="mypage-profile">
    <div id="mypage-icon">
        @if ($user->avatar_image)
            <img src="{{ asset('storage/avatar/' . $user->avatar_image) }}" alt="avatar" width="240px" />
        @else
            <!-- <img src="img/himakuro.png" width="240px"/> -->
        @endif
    </div>
    <div id="mypage-username">test user name</div>

    {!! Form::open(['url' => '/upload_image', 'method' => 'post', 'files' => true]) !!}

    {{--成功時のメッセージ--}}
    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    {{-- エラーメッセージ --}}
    @if ($errors->any())
        <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <div class="form-group">

        {!! Form::label('file', '画像アップロード', ['class' => 'control-label']) !!}
        {!! Form::file('file') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('アップロード', ['class' => 'btn btn-default']) !!}
    </div>
    {!! Form::close() !!}
</div>

<div id="ranking-content">
    <div class="ranking-tabs">
        <input id="mypage-overview-tab" type="radio" name="tab_item" checked>
        <label class="tab_item" for="mypage-overview-tab">Overview</label>

        <input id="mypage-movie-tab" type="radio" name="tab_item" onclick="resizeWindow();">
        <label class="tab_item" for="mypage-movie-tab">Movies</label>

        <input id="mypage-follow-tab" type="radio" name="tab_item">
        <label class="tab_item" for="mypage-follow-tab">Follow & Followers</label>

        <div class="tab_content" id="mypage-overview-tab-content">
            <div class="tab-content-description">
                <div id="mypage-chart-wrapper">
                    <div class="mypage-chart">
                        <canvas id="evaluation-chart"></canvas>
                        <p>Total Evaluated Movie Count: 123456</p>
                    </div>
                    <div class="mypage-chart">
                        <canvas id="reviewed-chart"></canvas>
                        <p>Total Reviewed Movie Count: 123456</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab_content" id="mypage-movie-tab-content">
            <div class="tab_content_description">
                <div id="mypage-reviewed-movies" class="glide">
                    <h2>Recently Reviewed Movies</h2>
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            @for ($i = 1; $i <= 5; $i++)
                            <?php $image = "img/movie$i.png"; ?>
                                <li class="glide__slide">
                                    <img src="{{$image}}" width="200px" height="120px"/>
                                </li>
                            @endfor
                        </ul>

                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><<</button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">>></button>
                        </div>
                    </div>
                </div>
                <div id="mypage-recommended-movies" class="glide">
                    <h2>Recommended Movies</h2>
                    <div class="glide__track" data-glide-el="track">
                        <ul class="glide__slides">
                            @for ($i = 5; $i > 0; $i--)
                            <?php $image = "img/movie$i.png"; ?>
                                <li class="glide__slide">
                                    <img src="{{$image}}" width="200px" height="120px"/>
                                </li>
                            @endfor
                        </ul>

                        <div class="glide__arrows" data-glide-el="controls">
                            <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><<</button>
                            <button class="glide__arrow glide__arrow--right" data-glide-dir=">">>></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab_content" id="mypage-follow-tab-content">
            <div class="tab_content_description">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="popular-user-ranking">
                        <h3>User Name {{$i}}</h3>
                        <img src="img/himakuro.png">
                        <div class="popular-user-ranking-description">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Total Movie Reviewed</th>
                                        <td>123456<td>
                                    </tr>
                                    <tr>
                                        <th>Following count</th>
                                        <td>123456<td>
                                    </tr>
                                    <tr>
                                        <th>Followed users count</th>
                                        <td>123456<td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<script src="js/glide.min.js"></script>
<script>
    var reviewedGlide = new Glide('#mypage-reviewed-movies', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
    })
    reviewedGlide.mount();

    var recommendedGlide = new Glide('#mypage-recommended-movies', {
        type: 'carousel',
        startAt: 0,
        perView: 4,
    })
    recommendedGlide.mount();

    function resizeWindow() {
        var resizeEvent = window.document.createEvent('UIEvents'); 
        resizeEvent .initUIEvent('resize', true, false, window, 0); 
        window.dispatchEvent(resizeEvent);
    }

    $(function(){
        var ctx = document.getElementById("evaluation-chart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["LOVED IT!", "GOOD!", "OK", "BAD!", "SUCKED!"],
                datasets: [{
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });

        var ctx2 = document.getElementById("reviewed-chart").getContext('2d');
        var myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ["ACTION", "MYSTERY", "FANTASY", "COMEDY", "ROMANCE"],
                datasets: [{
                    data: [12, 19, 3, 5, 2],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255,99,132,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true
            }
        });
    });
</script>
@endsection