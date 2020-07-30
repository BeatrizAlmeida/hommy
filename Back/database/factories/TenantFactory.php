<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Tenant;

$factory->define(Tenant::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email'=> $faker->email,
        'password'=> $faker->password,
        'republic_id'=> factory('App\Republic')->create()->id
    ];
});
