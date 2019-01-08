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
        Schema::create('review_agree', function(Blueprint $table){
            $table->integer('evaluator_id');
            $table->integer('evaluatee_id');
            $table->integer('movie_id');
            $table->smallInteger('evaluation'); // agree=> 1, disagree=> -1
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
        //
    }
}
