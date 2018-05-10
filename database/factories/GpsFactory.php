<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Gps::class, function (Faker $faker) {
    return [
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
        'imei' => $faker->imei,
        'speed' => $faker->randomNumber(),
        'direction' => $faker->randomFloat(),
        'gps_time' => date('ymdhis')
    ];
});
