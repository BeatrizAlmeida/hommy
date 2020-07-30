<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Republic;
use App\Locator;

$factory->define(Republic::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price'=> $faker->randomDigit(),
        'description'=> $faker->title,
        'bedrooms' => $faker->randomDigit(),
        'bathrooms'=> $faker->randomDigit(),
        'numberResidents'=> $faker->randomDigit(),
        'street' => $faker->title,
        'houseNumber'=> $faker->randomDigit(),
        'neighborhood'=> $faker->title,
        'city'=> $faker->title,
        'locator_id'=> factory('App\Locator')->create()->id 
    ];   
    });
