<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('storage_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->string('title');
            $table->string('duration');
            $table->timestamps();

            $table->foreign('storage_id')
                  ->references('id')
                  ->on('storages');

            $table->foreign('file_id')
                  ->references('id')
                  ->on('video_files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('models_videos');
    }
}
