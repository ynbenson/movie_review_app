<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class ReviewMoviesController extends Controller
{
    public function index(){
        $movies = Movie::all()->toArray();
        // fixme:既にユーザがレビューした映画は取り除きたいので、ここで鑑賞済の映画をとりのぞく必要がある
        shuffle($movies);
        //dd($movies);
        return view('reviewMovie', compact('movies'));
    }
}
