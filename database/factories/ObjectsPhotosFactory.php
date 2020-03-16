<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ObjectsPhoto::class, function (Faker $faker) {
    return [
        'object_id' => $faker->numberBetween(5,15),
        'name' => $faker->numberBetween(1,5).'.png',
        'path' => ''
    ];
});
