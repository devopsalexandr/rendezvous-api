<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Illuminate\Support\Str;
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

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // password
        'remember_token' => Str::random(10),
        'country' => 'Russian Federation',
        'city' => $faker->randomElement(['Astrakhan', 'Moscow']),
        'birthday' => $faker->date(),
        'tiny_about' => $faker->text(30),
        'sex' => $faker->randomElement(['male', 'female']),
        'car' => $faker->boolean,
        'lookfor' => $faker->randomElement(['male', 'female']),
    ];
});
