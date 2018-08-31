<?php

use Illuminate\Database\Seeder;
use App\Models\Storage;

class StoragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Storage::class, 5)->create();
    }
}
