<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->boolean('enabled')->default(false);
            $table->string('status');
            $table->string('action');
            $table->integer('number_files')->unsigned()->default(0);
            $table->bigInteger('size_files')->unsigned()->default(0);
            $table->bigInteger('size_processed_files')->unsigned()->default(0);
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
        Schema::dropIfExists('storage_tasks');
    }
}
