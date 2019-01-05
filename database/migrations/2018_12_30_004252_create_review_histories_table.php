<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('review_histories', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('movie_id');
            $table->smallInteger('review');
            $table->timestamps();
            $table->primary(['user_id','movie_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_histories');
    }
}
