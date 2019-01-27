<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Google_Client; 
use Google_Service_YouTube;

class ReviewMoviesController extends Controller
{
    public function index(){
        return view('rate_movie');
    }
    
//    public function rateMovie(Request $request){ 
//        if ($request->btn === "exc"){
//            $review_score = 2;
//        } elseif ($request->btn === "great"){
//            $review_score = 1;
//        } elseif ($request->btn === "ok"){
//            $review_score = 0;
//        } elseif ($request->btn === "poor"){
//            $review_score = -1;
//        } else {
//            $review_score = -2;
//        }
//        
//        DB::table('review_histories')->insert([
//            'user_id'       =>Auth::user()->id,
//            'movie_id'      =>$request->movie_id,
//            'review'        =>$review_score,
//            'created_at'    =>date('Y-m-d H:i:s'),
//            ]);
//        
//        return $this->getMovie();
//    }
    
    
    
    
    public function postReview(Request $request){
        $validatedData = $request->validate([
            'reviewText'=>'required|max:255'
        ]);

        $old_review = DB::table('movie_reviews')
                ->select('review_content')
                ->where('user_id', Auth::user()->id)
                ->where('movie_id', $request->movie_id)
                ->get();
                
        if ($old_review->count() === 0) {
            DB::table('movie_reviews')->insert([
                'user_id'        =>Auth::user()->id,
                'movie_id'       =>$request->movie_id,
                'review_content' =>$request->reviewText,
                'created_at'     =>date('Y-m-d H:i:s'),
                'updated_at'     =>date('Y-m-d H:i:s'),
            ]);
        } else {
            DB::table('movie_reviews')
                    ->where('user_id', Auth::user()->id)
                    ->where('movie_id', $request->movie_id)
                    ->update([
                        'review_content' => $request->reviewText,
                        'updated_at'     => date('Y-m-d H:i:s'),
                    ]);
        }
        
        return redirect()->route('movies.show', $request->movie_id);
    }
    
    /*
     * Purpose : return a movie object that user haven't rated or skipped
     * Precondition : none 
     * Postcondition : movie object
     */
//    public function getMovie(){
//        $user_id = Auth::user()->id;
//        $reviewed_movies = DB::table('review_histories')
//                ->select('movie_id')
//                ->where('user_id',$user_id)
//                ->get();
//        $reviewed_movies_id = $reviewed_movies->pluck('movie_id')->all();
//        $movie = DB::table('movies')
//                ->whereNotIn('movie_id', $reviewed_movies_id)
//                ->orderByRaw("RAND()")
//                ->limit(1)
//                ->get();                       
//        if ($movie->count() === 0) {
//            return redirect()->route('home')->with('alert', 'You have reviewed all movies in database!');
//        }
//            
//        return view('reviewMovie', ['movie' => $movie->first()]);   
//    }
    
    public function search(Request $request){
        // This code will execute if the user entered a search query in the form
        // and submitted the form. Otherwise, the page displays the form above.
        $query = $request->input('youtube_query');

        if ($query) {
            // Call set_include_path() as needed to point to your client library.
            require_once base_path('vendor').'/google/apiclient/src/Google/Client.php';

            $DEVELOPER_KEY = env("YOUTUBE_KEY", "default_value");
        
            $client = new Google_Client();
            $client->setDeveloperKey($DEVELOPER_KEY);

            // Define an object that will be used to make all API requests.
            $youtube = new Google_Service_YouTube($client);
             
            try {
                // Call the search.list method to retrieve results matching the specified
                // query term.
                $searchResponse = $youtube->search->listSearch('id,snippet', array(
                'q' => "$query trailer #1",
                'maxResults' => 1,
                ));
                
                $videos = '';
                $channels = '';
                $playlists = '';

                // Add each result to the appropriate list, and then display the lists of
                // matching videos, channels, and playlists.
                foreach ($searchResponse['items'] as $searchResult) {
                    switch ($searchResult['id']['kind']) {
                        case 'youtube#video':
                            $videos .= sprintf($searchResult['id']['videoId']);
                        break;
                        case 'youtube#channel':
                            $channels .= sprintf('<li>%s (%s)</li>',
                            $searchResult['snippet']['title'], $searchResult['id']['channelId']);
                        break;
                        case 'youtube#playlist':
                            $playlists .= sprintf('<li>%s (%s)</li>',
                            $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
                        break;
                    }
                }
                
                //dd($searchResponse);
            } catch (Google_Exception $e) {
                dd($e->getMessage());
            }
            return response()->json(['youtube_id'=>$videos]);
        }
    }
    
    public function rate(Request $request){
        
    }
}
