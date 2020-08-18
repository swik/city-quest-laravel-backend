<?php
declare(strict_types=1);

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Achievement;
use App\Models\CheckPoint;
use App\Models\Place;
use App\Models\Quest;
use Faker\Generator as Faker;

$factory->define(
    CheckPoint::class,
    function (Faker $faker) {
        return [
            'step' => $faker->numberBetween(1, 5),
            'place_id' => factory(Place::class)->create(),
            'quest_id' => factory(Quest::class)->create(),
            'achievement_id' => factory(Achievement::class)->create(),
        ];
    }
);
