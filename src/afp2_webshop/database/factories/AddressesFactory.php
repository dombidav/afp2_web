<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Addresses;
use Faker\Generator as Faker;

$factory->define(Addresses::class, function (Faker $faker) {
    return [
        'country' => $faker->numberBetween(0,100),
        'tin' => $faker->tin,
        'post_code' => $faker->post_code,
        'city' => $faker->city,
        'street' => $faker->street,
        'house' => $faker->house,
        'note' => $faker->note,
    ];
});
