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
            $table->string('level')->nullable();
            $table->string('time')->nullable();
            $table->string('mistake')->nullable();
            $table->string('wpm')->nullable();
            $table->string('cpm')->nullable();
            // $table->foreign('users_id')->references('id')->on('users');
            // $table->foreignId('userid')->index()->constrained('users')->cascadeOnDelete();
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
