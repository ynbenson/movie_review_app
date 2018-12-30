<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewMoviesController extends Controller
{
    public function index(){
        $movies = Movie::all()->toArray();
        \Log::debug($movies);
        return view('reviewMovie');
    }
}
