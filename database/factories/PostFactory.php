<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
	    'body' => $faker->paragraph,
        'user_id' => 1,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
    ];
});
