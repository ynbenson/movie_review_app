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

Auth::routes(['reset' => true, 'verify' => true]);

Route::group(['middleware' => 'auth'], function() {
    Route::post('/follow', 'UserController@follow');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/mypage', 'MypageController@index')->name('mypage');
    Route::get('/recommendUsers', 'UserController@recommend')->name('user.recommendUser');
    Route::get('/reviewMovies',  'ReviewMoviesController@index');
    Route::post('/reviewMovies/postReview','ReviewMoviesController@postReview')->name('reviewMoviesPage.postReview');
    Route::post('/movies/agree', 'MovieController@agree');
    Route::post('/movies/disagree', 'MovieController@disagree');
});

Route::get('/searchMovies', 'ReviewMoviesController@search');
Route::post('/rateMovies', 'ReviewMoviesController@rate');
Route::get('/rateMovies', 'ReviewMoviesController@index')->name('rateMoviesPage');
Route::post('reviewMovies', 'ReviewMoviesController@rateMovie')->name('ReviewMovies.rateMovies');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','HomeController@index');
Route::post('/upload_image', 'MypageController@upload_image');
Route::view('/search','movie_search');
Route::get('/movies', 'MovieController@index')->name('movies.index');
Route::get('/movies/{id}', 'MovieController@show')->name('movies.show');
Route::view('/ranking','ranking');
Route::get('/redirect', 'SocialAuthTwitterController@redirect');
Route::get('/callback', 'SocialAuthTwitterController@callback');

Route::get('about', function(){
//    $languages=[
//        'languages' => [
//            'Perl',
//            'PHP',
//            'Python'
//        ]
//    ];
//    \Log::debug($languages);
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
