<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class RankingController extends BaseController
{
    public function index()
    {
        // TODO Add auth check
        return view('ranking');
    }
}


