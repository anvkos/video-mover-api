<?php

use App\Models\Task;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'enabled' => true,
        'status' => Task::STATUS_PENDING,
        'action' => Task::ACTION_MOVE,
        'number_files' => 1,
    ];
});
