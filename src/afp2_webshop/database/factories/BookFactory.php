<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'created_at'=> $faker-> dateTimeThisMonth,
        'ISBN' => $faker->randomNumber(7,true),
        'title' => $faker->title,
        'thumbnail' => $faker ->text,
        'sample' => $faker ->text,
        //'author_id' => $faker->numberBetween(0,10),
        'publish_year' => $faker ->year(),
        'publisher_id'=> factory(App\Publisher::class),
        //'genre_id'=>$faker->numberBetween(0,10),
        'language' => 'hu',
        'page_count' => $faker ->numberBetween(1,2000),
        'description' => $faker ->text,
        'can_order' => $faker ->numberBetween(0,1),
        'can_preorder'=> $faker ->numberBetween(0,1),
        'in_stock' => $faker ->numberBetween(0,1500),
        'price' => $faker ->numberBetween(1,100000),
        'discount' => $faker ->numberBetween(0,100000),
        ];
    });
