<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;


$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name_product' => $faker->name,
        'val_product' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8), // 48.8932
        'des_product' => $faker->text,
        'photo_product' => '/assets/products/default.png',
    ];
});
