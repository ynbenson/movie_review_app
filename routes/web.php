<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::view('/','home');
Route::get('/redirect', 'SocialAuthTwitterController@redirect');
Route::get('/callback', 'SocialAuthTwitterController@callback');
//Route::get('/reviewMovies', '');

Route::post('about', function(){
    $languages=[
        'languages' => [
            'Perl',
            'PHP',
            'Python'
        ]
    ];
    \Log::debug($languages);
//    \Log::info('Just an informational message.');
    return View::make('about')->with('number_of_movies',100);
});

/* present registration form */
//Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');

/* processing registration form */
//Route::post('register', 'Auth\RegisterController@register');

/* present login form */
//Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');

/* processing login form input */
//Route::post('login', 'Auth\LoginController@login');

/*
// route to show the login form
Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form 
Route::post('login', array('uses' => 'HomeController@doLogin'));
*/
