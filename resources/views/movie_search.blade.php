@extends('layouts/app')
@section('contents')
<style>
    #search-result {
        float: left;
        width: 70%;
        margin: 0px 10px 10px 10px;
    }

    .movie-search-result {
        float: left;
        border-bottom: 1px dotted black;
    }

    .movie-search-result img {
        width: 375px;
        height: 150px;
        float: left;
    }

    .movie-search-result-description {
        margin: 3px 10px 5px 20px;
        float: right;
    }
</style>
<div id="search-result">
    <h2 class="arrow">Search Result</h2>
    <div class="movie-search-result">
        <h3>Movie Title ---------</h3>
        <img src="img/movie3.png"/>
        <div class="movie-search-result-description">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Screening Date</th>
                        <td> December 29. 2018<td>
                    </tr>
                    <tr>
                        <th>high evaluation score</th>
                        <td>12345<td>
                    </tr>
                    <tr>
                        <th>reviewed counts</th>
                        <td>12345<td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="movie-search-result">
        <h3>Movie Title ---------</h3>
        <img src="img/movie5.png"/>
        <div class="movie-search-result-description">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Screening Date</th>
                        <td> December 29. 2018<td>
                    </tr>
                    <tr>
                        <th>high evaluation score</th>
                        <td>12345<td>
                    </tr>
                    <tr>
                        <th>reviewed counts</th>
                        <td>12345<td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="movie-search-result">
        <h3>Movie Title ---------</h3>
        <img src="img/movie4.png"/>
        <div class="movie-search-result-description">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Screening Date</th>
                        <td> December 29. 2018<td>
                    </tr>
                    <tr>
                        <th>high evaluation score</th>
                        <td>12345<td>
                    </tr>
                    <tr>
                        <th>reviewed counts</th>
                        <td>12345<td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="movie-search-result">
        <h3>Movie Title ---------</h3>
        <img src="img/movie1.png"/>
        <div class="movie-search-result-description">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Screening Date</th>
                        <td> December 29. 2018<td>
                    </tr>
                    <tr>
                        <th>high evaluation score</th>
                        <td>12345<td>
                    </tr>
                    <tr>
                        <th>reviewed counts</th>
                        <td>12345<td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="movie-search-result">
        <h3>Movie Title ---------</h3>
        <img src="img/movie2.png"/>
        <div class="movie-search-result-description">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Screening Date</th>
                        <td> December 29. 2018<td>
                    </tr>
                    <tr>
                        <th>high evaluation score</th>
                        <td>12345<td>
                    </tr>
                    <tr>
                        <th>reviewed counts</th>
                        <td>12345<td>
                    </tr>
                </tbody>
            </table>
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