<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'price' => $faker->randomNumber(3),
        'description' => $faker->text($maxNbChars = 500),
        'published' => true,
    ];
});
