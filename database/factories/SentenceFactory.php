<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sentence;
use Faker\Generator as Faker;

$factory->define(Sentence::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence,
        'exposed_at' => $faker->dateTime,
        'views' => $faker->randomNumber(2),
    ];
});
