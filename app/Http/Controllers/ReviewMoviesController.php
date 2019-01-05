<?php

namespace App\Http\Controllers;

use App\Movie;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewMoviesController extends Controller
{
    public function index(){
        if (Auth::check()){
            $user_id = Auth::user()->id;
            $reviewed_movies = DB::table('review_histories')
                    ->select('movie_id')
                    ->where('user_id',$user_id)
                    ->get();
            $reviewed_movies_id = $reviewed_movies->pluck('movie_id')->all();
            
            $movies = DB::table('movies')
                    ->whereNotIn('movie_id', $reviewed_movies_id)
                    ->orderByRaw("RAND()")
                    ->get();                       
            
            if ($movies->count() === 0) {
                return redirect()->route('home')->with('alert', 'You have reviewed all movies in database!');
            }
            
            //dd($movies);
            //shuffle($movies);
            return view('reviewMovie', ['movies' => $movies]);            
        } else {
            return redirect()->route('login');
        }

    }
}
