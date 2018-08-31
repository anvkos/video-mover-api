<?php

use Illuminate\Database\Seeder;
use App\Models\Storage;
use App\Models\VideoFile;

class VideoFilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $storages = Storage::limit(5)->get();
        foreach ($storages as $storage) {
            factory(VideoFile::class)->create(['storage_id' => $storage->id]);
        }
    }
}
