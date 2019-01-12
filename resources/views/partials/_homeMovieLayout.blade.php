<li class="glide__slide">
    <div class="home-movie-thumbnail">
        <img src="{{ $movie['poster_path'] }}" width="240px"/>
    </div>
    <div class="latest-movie-description">
        <p class="home-movie-title">{{ $movie['title'] }}</p>
        <p class="home-movie-description">{{ $movie['overview'] }}</p>
        <p class="home-movie-evaluation">Evaluation: {{ $movie['vote_avg'] }}</p>
        <p class="home-movie-date">Screening Date: {{ $movie['released_at'] }}</p>
    </div>
</li>