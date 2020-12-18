<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\ProjectComment::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
    ];
});
