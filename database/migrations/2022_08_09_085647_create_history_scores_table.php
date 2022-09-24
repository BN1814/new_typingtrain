<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_scores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('exercise_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('time')->nullable();
            $table->string('mistake')->nullable();
            $table->string('wpm')->nullable();
            $table->string('cpm')->nullable();
            $table->string('score')->nullable();
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade')    ->onUpdate('cascade');
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('history_scores');
    }
}
