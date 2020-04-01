<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book_author;
use Faker\Generator as Faker;

$factory->define(Book_author::class, function (Faker $faker) {
    return [
        'author_id' => factory(App\Author::class)->create(),
        'book_id' => $faker->numberBetween(0,100)
    ];
});
