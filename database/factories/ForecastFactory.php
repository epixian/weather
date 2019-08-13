<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Forecast;
use Faker\Generator as Faker;

$factory->define(Forecast::class, function (Faker $faker) {
    return [
        'weather_location_id' => factory('App\Location')->create()->id,
        'data' => $faker->randomNumber
    ];
});
