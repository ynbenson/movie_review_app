<?php

use Illuminate\Database\Seeder;
use App\ReviewHistory;

class ReviewHistoryTableSeeder extends Seeder
{
    public function run()
    {
        ReviewHistory::create(array(
            'user_id'   => 2,
            'movie_id'  => 1,
            'review'    => 1,
        ));

        ReviewHistory::create(array(
            'user_id'   => 2,
            'movie_id'  => 2,
            'review'    => -1,
        ));
    }
}
