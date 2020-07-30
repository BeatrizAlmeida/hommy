<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Comment;
use App\Republic;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text,
        'rating'=> $faker->numberBetween(0,5),
        'republic_id'=> factory('App\Republic')->create()->id

    ];
});
