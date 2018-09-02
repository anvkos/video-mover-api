<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStorageTaskCriteriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_task_criteria', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('task_id')->unsigned();
            $table->string('property');
            $table->string('sign');
            $table->integer('number')->unsigned();
            $table->string('unit_name');
            $table->string('sorting_direction');
            $table->timestamps();

            $table->foreign('task_id')
                  ->references('id')
                  ->on('storage_tasks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storage_task_criteria');
    }
}
