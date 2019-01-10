<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index')->with('movies',$movies);
    }
    
    
    public function agree(Request $request){
        $record = DB::table('review_agrees')
                ->select('id')
                ->where('evaluator_id', Auth::user()->id)
                ->where('evaluatee_id', $request->input('reviewer_id'))
                ->where('movie_id', $request->input('movie_id'))
                ->get();
        
        if ($record->count() === 0){
            DB::table('review_agrees')->insert([
                'evaluator_id'      => Auth::user()->id,
                'evaluatee_id'      => $request->input('reviewer_id'),
                'movie_id'          => $request->input('movie_id'),
                'agree'             => 1,
                'disagree'          => 0,
            ]);
        } else {
            DB::table('review_agrees')->where('id', $record->first()->id)->update(['agree' => 0]);
        }
    }
    
    
    public function disagree(Request $request){
        $record = DB::table('review_agrees')
                ->select('id')
                ->where('evaluator_id', Auth::user()->id)
                ->where('evaluatee_id', $request->input('reviewer_id'))
                ->where('movie_id', $request->input('movie_id'))
                ->get();
        
        if ($record->count() === 0){
            DB::table('review_agrees')->insert([
                'evaluator_id'      => Auth::user()->id,
                'evaluatee_id'      => $request->input('reviewer_id'),
                'movie_id'          => $request->input('movie_id'),
                'agree'             => 0,
                'disagree'          => 1,
            ]);
        } else {
            DB::table('review_agrees')->where('id', $record->first()->id)->update(['disagree' => 0]);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $movie = DB::table('movies')
            ->where('movie_id', $id)
            ->get()
            ->first();       
        
        $reviews = DB::table('movie_reviews')
                ->join('users', 'users.id', '=', 'movie_reviews.user_id')
                ->select('movie_reviews.user_id','username', 'review_content', 'movie_reviews.updated_at')
                ->where('movie_reviews.movie_id', $id)
                ->get();
        
        $user_id = -1;
        if (Auth::check()){ $user_id = Auth::user()->id; }
        
        return view('movies.show')
                ->with('movie',$movie)
                ->with('reviews',$reviews)
                ->with('viewer_id', $user_id);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
