@extends('layouts/app')
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

@section('contents')
<div class="home-content">
    <h2 class="home"> Latest Movies</h2>
    <div id="latest-movies" class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide"><img src="img/movie1.png" width="240px"/></li>
                <li class="glide__slide"><img src="img/movie2.png" width="240px"/></li>
                <li class="glide__slide"><img src="img/movie3.png" width="240px"/></li>
                <li class="glide__slide"><img src="img/movie4.png" width="240px"/></li>
                <li class="glide__slide"><img src="img/movie5.png" width="240px"/></li>
            </ul>

            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><<</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">>></button>
            </div>
        </div>
    </div>

    <h2 class="home"> Recommended Movies</h2>
    <div id="recommended-movies" class="glide">
        <div class="glide__track" data-glide-el="track">
            <ul class="glide__slides">
                <li class="glide__slide"><img src="img/movie3.png" width="240px"/></li>
                <li class="glide__slide"><img src="img/movie4.png" width="240px"/></li>
                <li class="glide__slide"><img src="img/movie5.png" width="240px"/></li>
                    <li class="glide__slide"><img src="img/movie1.png" width="240px"/></li>
                <li class="glide__slide"><img src="img/movie2.png" width="240px"/></li>
            </ul>

            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><<</button>
                <button class="glide__arrow glide__arrow--right" data-glide-dir=">">>></button>
            </div>
        </div>
    </div>
</div>

<script src="js/glide.min.js"></script>
<script>
    var latestGlide = new Glide('#latest-movies', {
        type: 'carousel',
        startAt: 0,
        perView: 3
    })
    latestGlide.mount();
    var recommendedGlide = new Glide('#recommended-movies', {
        type: 'carousel',
        startAt: 0,
        perView: 3
    })
    recommendedGlide.mount();
</script>

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



@if (Auth::check())
    @if ($reviewed === 0)
        <script>
            $(function() {
                $("#exampleModal").modal();//if you want you can have a timeout to hide the window after x seconds
            });
        </script>
    @endif
@endif


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    @if (Auth::check())
                        Welcome {{ Auth::user()->username }}!         
                    @endif
                    Let's Review Some Movies!
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You can review movies easily in our Movie Reviewing Page.
                This allows us to analyze your movie preference and suggest movies which you'll probably like! 
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Not now</button>
            <a href="{{ url('/reviewMovies/') }}" class="btn btn-primary">Go to Movie Review Page</a>
            </div>
        </div>
    </div>
</div>
        
{{-- need these for modal window --}}
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection

