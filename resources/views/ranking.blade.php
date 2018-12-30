@extends('layouts/app')
@section('contents')
<style>
    #ranking-content {
        float: left;
        width: 73%;
        margin: 0px 10px 10px 10px;
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
        border-bottom: 3px solid #000000;
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
        border-bottom: 3px solid #000000;
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
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        width: 100%;
        margin: 0 0 0 0;
    }

    .tab_item {
        width: calc(100%/3);
        height: 50px;
        border-bottom: 3px solid #000000;
        background-color: #d9d9d9;
        line-height: 50px;
        font-size: 16px;
        text-align: center;
        color: #565656;
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

    #movie-ranking:checked ~ #movie-ranking-content,
    #most-reviewed-user:checked ~ #most-reviewed-user-content,
    #popular-user-ranking:checked ~ #popular-user-ranking-content {
        display: block;
    }

    .tabs input:checked + .tab_item {
        background-color: #5ab4bd;
        color: #fff;
    }

</style>
<div id="ranking-content">
    <div class="ranking-tabs">
        <input id="movie-ranking" type="radio" name="tab_item" checked>
        <label class="tab_item" for="movie-ranking">Movie Ranking</label>

        <input id="most-reviewed-user" type="radio" name="tab_item">
        <label class="tab_item" for="most-reviewed-user">Most Reviewed User</label>

        <input id="popular-user-ranking" type="radio" name="tab_item">
        <label class="tab_item" for="popular-user-ranking">Most Popular User</label>

        <div class="tab_content" id="movie-ranking-content">
            <div class="tab-content-description">
                @for ($i = 1; $i <= 5; $i++)
                    <?php $image = "img/movie$i.png"; ?>
                    <div class="movie-search-result">
                        <h3>Movie Title {{$i}}</h3>
                        <img src="{{$image}}"/>
                        <div class="movie-search-result-description">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Screening Date</th>
                                        <td> December 29. 2018<td>
                                    </tr>
                                    <tr>
                                        <th>Evaluation Score</th>
                                        <td>12345<td>
                                    </tr>
                                    <tr>
                                        <th>Reviewed Counts</th>
                                        <td>12345<td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <div class="tab_content" id="most-reviewed-user-content">
            <div class="tab_content_description">
                @for ($i = 1; $i <= 5; $i++)
                    <div class="most-reviewed-user-ranking">
                        <h3>User Name {{$i}}</h3>
                        <img src="img/himakuro-surprise.png">
                        <div class="most-reviewed-user-ranking-description">
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
        <div class="tab_content" id="popular-user-ranking-content">
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
<div id="r-sidebar">
    <div class="r-sidebar-content">
        <h3 class="home">Latest Movies</h3>
    </div>
    <div class="r-sidebar-content">
        <h3 class="home">Recommended Movies</h3>
    </div>
    <div class="r-sidebar-content">
        <h3 class="home">Categories</h3>
    </div>
</div>

@endsection