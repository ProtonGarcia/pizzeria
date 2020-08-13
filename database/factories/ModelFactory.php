<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\User;

$factory->define(App\User::class, function (Faker\Generator $faker) {
   
    return [
        'name' => $faker->name,
        'address' =>$faker->address,
        'phone' => $faker->numberBetween(22332233,22337766),
        'record' => $faker->numberBetween(1,50),
        'email' => $faker->unique()->safeEmail,
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
   

    return [
        'name' => $faker->word,
        'description' =>$faker->paragraph(1),
        'quantity' => $faker->  numberBetween(1,1000),
        'on_sale' => $faker->randomElement([Product::PRODUCT_ON_SALE, Product::PRODUCT_NOT_ON_SALE]),
        'status' => Product::PRODUCT_AVAILABLE,
        'price' => $faker->numberBetween(12,20),
        'record' =>$faker->numberBetween(1,600),
        'image' => $faker->randomElement(['img1.jpg','img2.jpg','img3.jpg']),
        'client_id' => User::all()->random()->id,
    ];
});

$factory->define(App\Order::class, function (Faker\Generator $faker) {
   

    return [
        'quantity' => $faker->numberBetween(1,10),
        'total' => $faker->numberBetween(10,60),
        'client_id' => User::all()->random()->id,
        'product_id' => Product::all()->random()->id,
    ];
});


$factory->define(App\Restaurant::class, function (Faker\Generator $faker) {
   

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(1),
        'address' => $faker->address,
        'phone' => $faker->numberBetween(22222233,22227766),
        'image' => $faker->randomElement(['img4.jpg','img5.jpg','img6.jpg']),
    ];
});