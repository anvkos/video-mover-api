<?php

use Faker\Generator as Faker;
use App\Models\Storage;
use App\Models\VideoFile;

$factory->define(VideoFile::class, function (Faker $faker, $attributes = []) {
    $storageId = $attributes['storage_id'] ?? factory(Storage::class)->create()->id;
    return [
        'storage_id' => $storageId,
        'file_size' => $faker->numberBetween(1000, 900000),
        'status' => VideoFile::STATUS_ENCODED,
    ];
});
