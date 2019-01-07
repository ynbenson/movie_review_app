@extends('layouts/app')
@section('contents')

    <ul>
    @foreach ($movies as $movie)
        <li>
            {!! link_to_route('movies.show', $movie->title, ['id'=>$movie->movie_id]) !!}
        </li> 
    @endforeach
    </ul>

@endsection