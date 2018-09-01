<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageStoragesTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_storages_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned();
            $table->integer('storage_id')->unsigned();
            $table->string('kind');
            $table->timestamps();

            $table->foreign('task_id')
                  ->references('id')
                  ->on('storage_tasks');

            $table->foreign('storage_id')
                  ->references('id')
                  ->on('storages');

            $table->unique(['task_id','storage_id']);
            $table->index(['kind','storage_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_storages_tasks');
    }
}
