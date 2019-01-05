<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewMoviesController extends Controller
{
    public function index(){
        if (Auth::check()){
            $movies = Movie::all()->toArray();
            // fixme:既にユーザがレビューした映画は取り除きたいので、ここで鑑賞済の映画をとりのぞく必要がある
            shuffle($movies);
            //dd($movies);
            return view('reviewMovie', compact('movies'));            
        } else {
            //return 1;
            return redirect()->route('login');
        }

    }
}
