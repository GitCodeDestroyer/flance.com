<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Projects\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'owner_id' => function() {
            return factory(App\Models\User::class)->create()->id;
        }
    ];
});
