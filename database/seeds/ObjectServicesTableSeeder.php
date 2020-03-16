<?php

use Illuminate\Database\Seeder;

class ObjectServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ObjectService::class, 20)->create();
    }
}
