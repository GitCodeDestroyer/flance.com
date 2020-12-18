<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\BookingComment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
    ];
});
