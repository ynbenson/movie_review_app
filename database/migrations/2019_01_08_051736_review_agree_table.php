<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReviewAgreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review_agrees', function(Blueprint $table){
            $table->increments('id'); // agree id 
            $table->integer('evaluator_id');
            $table->integer('evaluatee_id');
            $table->integer('movie_id');
            $table->boolean('agree');
            $table->boolean('disagree');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('review_agrees');
    }
}
