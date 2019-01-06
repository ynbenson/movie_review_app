<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovieReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {       
        Schema::create('movie_reviews', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('movie_id');
            $table->smallInteger('review');
            $table->string('review_content');
            $table->timestamps();
            $table->primary(['user_id','movie_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_reviews');
    }
}
