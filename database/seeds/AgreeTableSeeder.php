<?php

use Illuminate\Database\Seeder;
use App\ReviewAgree;

class AgreeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReviewAgree::create(array(
            'evaluator_id'  => 2,
            'evaluatee_id'  => 1,
            'movie_id'      => 1,
            'agree'         => 0,
            'disagree'      => 0,
        ));
    }
}
