<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_counters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('video_id')->unsigned()->default(0);
            $table->integer('views')->unsigned()->default(0);
            $table->integer('views_day')->unsigned()->default(0);
            $table->integer('views_week')->unsigned()->default(0);
            $table->integer('views_month')->unsigned()->default(0);
            $table->integer('views_year')->unsigned()->default(0);
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
        Schema::dropIfExists('video_counters');
    }
}
