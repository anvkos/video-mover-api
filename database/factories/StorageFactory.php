<?php

use Faker\Generator as Faker;
use App\Models\Storage;

$factory->define(Storage::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    return [
        'name' => $name,
        'domain' => $faker->unique()->domainName,
        'host' => $faker->unique()->ipv4,
        'data_path' => "/mnt/stroage_{$name}/video/data",
        'group' => Storage::GROUP_FAST,
    ];
});
