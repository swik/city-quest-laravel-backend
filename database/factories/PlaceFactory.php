<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Place;
use App\Models\City;
use Faker\Generator as Faker;
use MStaack\LaravelPostgis\Geometries\Point;

$factory->define(
    Place::class,
    function (Faker $faker) {
        return [
            'name' => $faker->company,
            'location' => new Point($faker->latitude, $faker->longitude),
            'city_id' => factory(City::class)->create(),
        ];
    }
);
