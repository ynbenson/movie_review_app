<?php

use Illuminate\Database\Seeder;
use App\MovieReview;

class MovieReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MovieReview::create(array(
            'user_id'       => 1,
            'movie_id'      => 1,
            'review_content'=> "楽しかった!!!"
        ));
        
        MovieReview::create(array(
            'user_id'       => 3,
            'movie_id'      => 1,
            'review_content'=> "思ったより感動しなかった"
        ));
        
        MovieReview::create(array(
            'user_id'       => 4,
            'movie_id'      => 1,
            'review_content'=> "どこかで見たかのような既視感。それでもいくつかの物語が非常に心にくる。特に #橋本愛 さんの演技にちょっと震えた。"
        ));
    }
}
