<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Validator, Input, Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends BaseController
{
    public function index()
    {
//        if (Auth::check()){
//            $user=Auth::user();
//            echo($user['username']);
//        } else {
//            echo('currently not logged in');
//        }
        return view('home');
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


