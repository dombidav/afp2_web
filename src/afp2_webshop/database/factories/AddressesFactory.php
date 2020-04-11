<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Addresses;
use Faker\Generator as Faker;

$factory->define(Addresses::class, function (Faker $faker) {
    return [
        'country' => $faker->numberBetween(0,100),
        'tin' => $faker->lexify('000000000'),
        'postal_code' => $faker->lexify('0000'),
        'city' => $faker->city,
        'street' => $faker->address,
        'house' => $faker->numberBetween(0,100),
        'note' => $faker->sentence(),
    ];
});
