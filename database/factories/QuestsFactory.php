<?php
declare(strict_types=1);

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Quest;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(
    Quest::class,
    function (Faker $faker) {
        return [
            'creator_id' => factory(User::class)->create(),
            'title' => $faker->text(10),
            'description' => $faker->text,
        ];
    }
);
