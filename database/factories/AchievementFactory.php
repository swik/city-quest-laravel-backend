<?php
declare(strict_types=1);

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Achievement;
use Faker\Generator as Faker;

$factory->define(
    Achievement::class,
    function (Faker $faker) {
        return [
            'title' => $faker->text(200),
            'icon' => $faker->imageUrl(),
        ];
    }
);
