<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\ObjectService::class, function (Faker $faker) {
    return [
        'object_id' => 16,
        'service_id' => $faker->numberBetween(21,202),
        'value' => 1
    ];
});
