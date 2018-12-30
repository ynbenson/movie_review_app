<?php

use App\Movie;
use Illuminate\Database\Seeder;

class MovieTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('movies')->truncate();
        
        Movie::create([
            'title' => "ツナグ",
            'genre' => "drama",
            'released_at' => "2012-10-06",
            'youtube_id' => "fQngF6tmh7s"
        ]);
        
        Movie::create([
            'title' => "Frozen",
            'genre' => "animation",
            'released_at' => "2013-11-27",
            'youtube_id' => "TbQm5doF_Uc"
        ]);
        
        Movie::create([
            'title' => "LIAR GAME The Final Stage",
            'genre' => "drama",
            'released_at' => "2013-05-13",
            'youtube_id' => "ufaE3iKdzVE"
        ]);
        
        Movie::create([
            'title' => "Deadpool",
            'genre' => "action",
            'released_at' => "2015-08-04",
            'youtube_id' => "ONHBaC-pfsk"
        ]);
    }
}
