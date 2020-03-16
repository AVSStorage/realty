<?php

use Illuminate\Database\Seeder;

class ObjectPhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ObjectsPhoto::class, 10)->create();
    }
}
