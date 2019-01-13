<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Validator, Input, Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class HomeController extends BaseController
{
    public function index()
    {
        $reviewed = 0; /* $reviewed == 0 if user never used review feature, otherwise 1*/
        if (Auth::check()){ 
            $user_id = Auth::user()->id;
            if (DB::table('review_histories')->where('user_id','=',$user_id)->count() != 0){
                $reviewed = 1;
            }
        }
        
        $curl = curl_init();
        $title = urlencode("109445");
        $tmdb_api_key = env('TMDB_KEY');
        curl_setopt_array($curl, array(
          //CURLOPT_URL => "https://api.themoviedb.org/3/movie/%7B".$title."    %7D/images?language=en-US&api_key=7961e2f0de5b64940c087e1ee64d3840",
          CURLOPT_URL => "https://api.themoviedb.org/3/movie/popular?page=1&language=en-US&api_key=".$tmdb_api_key,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $jset = json_decode($response, true);
            $movies = $jset['results'];
            $ret = [];
            foreach($movies as $movie){
                $arr = array(
                    "title"         => $movie["title"],
                    "overview"      => $movie["overview"],
                    "poster_path"   => "https://image.tmdb.org/t/p/w500".$movie["poster_path"],
                    "released_at"   => $movie["release_date"],
                    "vote_avg"      => $movie["vote_average"],
                );
                $ret[] = $arr;
            }
            unset($movie); 
        }
        //dd($ret);
        return view('home', ['reviewed' => $reviewed, 'movies' => $ret]);
    }
    
    
    
    
    public function get_latest_movies(){
        
    }

    public function showLogin()
    {
        // show the form
        return view('login');
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 6 characters
        );

        // run the validation rules on the inputs from the form
        $attrs = Input::only(['email', 'password']);
        $validator = Validator::make($attrs, $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata)) {

                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                echo 'SUCCESS!';

            } else {        
                // validation not successful, send back to form 
                return view('login');
                // return Redirect::to('login');
            }
        }
        return view('login');
    }
}


?>