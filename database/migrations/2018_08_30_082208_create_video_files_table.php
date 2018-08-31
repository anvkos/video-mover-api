<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('storage_id')->unsigned();
            $table->integer('file_size')->unsigned();
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('storage_id')
                  ->references('id')
                  ->on('storages');

            $table->index('status');
            $table->index('created_at');
            $table->index(['status','created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('video_files');
    }
}
