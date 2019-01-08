@extends('layouts/app')
@section('contents')
    <h1>Movie List</h1>
    <ul>
    @foreach ($movies as $movie)
        <li>
            {!! link_to_route('movies.show', $movie->title, ['id'=>$movie->movie_id]) !!}
        </li> 
    @endforeach
    </ul>

@endsection