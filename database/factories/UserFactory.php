<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'name_user' => $faker->name,
        'email_user' => $faker->unique()->safeEmail,
        'password_user' => '1234', // password
         'admin_user'=> 0
    ];
});
