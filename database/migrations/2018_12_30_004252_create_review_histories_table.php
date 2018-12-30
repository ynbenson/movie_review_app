<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewHistoriesTable extends Migration
{
    public function up()
    {
        Schema::create('review_histories', function (Blueprint $table) {
            $table->string('user_id');
            $table->string('movie_id');
            $table->smallInteger('review');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('review_histories');
    }
}
