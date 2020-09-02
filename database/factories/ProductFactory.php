<?php

use App\Products;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Products::class, function (Faker $faker) {
    $name = $faker->company;
    return [
        'name' => $name,
        'slug' =>str_slug($name),
        'price' => random_int(10,100)
    ];
});
