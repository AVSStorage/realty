<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Orders::class, function (Faker $faker) use ($factory) {
    return [
        'totalPrice' => $faker->randomNumber(),
        'object_id' => $factory->create(\App\Objects::class)->id,
        'parents' => $faker->numberBetween(0,10),
        'children' =>  $faker->numberBetween(0,10),
        'status' => $faker->numberBetween(0,4),
        'date_from' => $faker->date('Y-m-d'),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'date_to' => $faker->date('Y-m-d'),
        'user_id' => $factory->create(\App\User::class)->id
    ];
});
