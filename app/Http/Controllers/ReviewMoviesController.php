<?php

namespace App\Http\Controllers;

use App\Movie;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewMoviesController extends Controller
{
    public function getMovie(){
        $user_id = Auth::user()->id;
        $reviewed_movies = DB::table('review_histories')
                ->select('movie_id')
                ->where('user_id',$user_id)
                ->get();
        $reviewed_movies_id = $reviewed_movies->pluck('movie_id')->all();
        $movie = DB::table('movies')
                ->whereNotIn('movie_id', $reviewed_movies_id)
                ->orderByRaw("RAND()")
                ->limit(1)
                ->get();                       
        if ($movie->count() === 0) {
            return redirect()->route('home')->with('alert', 'You have reviewed all movies in database!');
        }
            
        return view('reviewMovie', ['movie' => $movie]);   
    }
    
    public function index(){
        return $this->getMovie();   
    }
    
    public function rateMovie(Request $request){
        if ($request->btn === "exc"){
            $review_score = 2;
        } elseif ($request->btn === "great"){
            $review_score = 1;
        } elseif ($request->btn === "ok"){
            $review_score = 0;
        } elseif ($request->btn === "poor"){
            $review_score = -1;
        } else {
            $review_score = -2;
        }
        
        DB::table('review_histories')->insert([
            'user_id'       =>Auth::user()->id,
            'movie_id'      =>$request->movie_id,
            'review'        =>$review_score,
            'created_at'    =>date('Y-m-d H:i:s'),
            ]);
        
        return $this->getMovie();
    }
}
