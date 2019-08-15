<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WeatherLocation;
use Faker\Generator as Faker;

$factory->define(WeatherLocation::class, function (Faker $faker) {
    return [
        // 'user_id' => factory('App\User')->create()->id,
        // 'address' => $faker->postcode,
        'address' => '12345',
        // 'lat' => $faker->randomFloat(7, -90, 90),
        // 'lng' => $faker->randomFloat(7, -179.9999999, 180)
    ];
});
