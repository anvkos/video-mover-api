<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_operations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned();
            $table->integer('src_storage_id')->unsigned();
            $table->integer('dst_storage_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->string('status');
            $table->string('action');
            $table->string('error')->nullable();
            $table->string('error_message')->nullable();

            $table->timestamps();

            $table->foreign('task_id')
                  ->references('id')
                  ->on('storage_tasks');

            $table->foreign('src_storage_id')
                  ->references('id')
                  ->on('storages');

            $table->foreign('dst_storage_id')
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
        Schema::dropIfExists('storage_operations');
    }
}
