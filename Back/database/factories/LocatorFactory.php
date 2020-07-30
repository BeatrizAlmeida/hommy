<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Locator;

$factory->define(Locator::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email'=> $faker->email,
        'cpf'=> $faker->cpf,
        'password'=> $faker->password,
        'phoneNumber'=> $faker->phoneNumber,
    ];
});
