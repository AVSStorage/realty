<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Objects::class, function (Faker $faker) {
    $array = ['Кирова', 'Карла Маркса','Садовая','Гоголя','Дражинского'];
    return [
        'type' => $faker->numberBetween(1,4),
        'coordinateX' => $faker->randomFloat(2,0,50),
        'coordinateY' =>  $faker->randomFloat(2,0,50),
        'center_path' =>  $faker->numberBetween(1,15),
        'airport' => $faker->word,
        'area' => $faker->word,
        'district' => $faker->word,
        'community' => $faker->word,
        'airport_path' => $faker->numberBetween(1,10),
        'railway' =>  $faker->word,
        'railway_path' =>  $faker->numberBetween(1,10),
        'country' => 'Россия',
        'region' => 'Сочи',
        'city' => 'Ялта',
        'string' => $array[$faker->numberBetween(0,4)],
        'house' => $faker->numberBetween(1,50),
        'housing' =>  $faker->numberBetween(51,100),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime
    ];
});
