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
        $reviewed = 0;
        if (Auth::check()){
            $user_id = Auth::user()->id;
            if (DB::table('review_histories')->where('user_id','=',$user_id)->get()){
                $reviewed = 1;
            }
        }
        
        return view('home', ['reviewed' => $reviewed]);
       
//        $user_id = -1;
//        if (Auth::check()){
//            $user=Auth::user();
//            $user_id = $user['id'];
//        } 
//        return view('home')->with('user_id', $user_id);
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