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
            $table->string('level');
            $table->string('time');
            $table->string('mistake');
            $table->string('wpm');
            $table->string('cpm');
            $table->timestamps();
            // ยังไม่ได้ migrate
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
