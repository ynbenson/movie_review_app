<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class SocialAuthTwitterController extends Controller
{
    public function  redirect(){
        return Socialite::driver('twitter')->redirect();
    }
    
    public function callback(){
        
    }
}
