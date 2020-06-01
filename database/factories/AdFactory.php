<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\Ad::class, function (Faker $faker) {

    return [
        'title' => 'Bulletin #'.rand(1,33),
        'text' => $faker->paragraph,
        'image' => 'public/image/'.rand(1,5).'.jpg',
        'user_id' => rand(1,5),
        'category_id' => rand(1,5),
    ];
});
