<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client; 
use Google_Service_YouTube;
class MainController extends Controller
{
    public function write1(){
        return view('youtubeTest');
    }
    
    public function show(Request $request){
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
                
                //dd($videos);
                //dd($searchResponse);
            } catch (Google_Exception $e) {
                dd($e->getMessage());
            }
            return response()->json(['youtube_id'=>$videos]);
            
//    public function write1(Request $request)
//    {        
//        $json1 = $request->input('bangou');
//        $json2 = $request->input('name');    
//         $data1 = ['code' => '001', 'name' => 'eigyou'];
//         return $data1;
//        return response()->json([
//            'code' => '1',
//            'name' => 'eigyou'
//         ]);
//    }
        }
    }
}
