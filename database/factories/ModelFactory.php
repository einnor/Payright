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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});



$factory->define(\App\Role::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => factory('App\User')->create()->id,
        'role'        => $faker->numberBetween(1,4),
    ];
});


$factory->define(\App\Client::class, function (Faker\Generator $faker) {
    return [
        'user_id'     => factory('App\Role')->create()->user_id,
        'name'        => $faker->name,
        'service'     => $faker->paragraphs(3,true),
    ];
});


$factory->define(\App\Invoice::class, function (Faker\Generator $faker) {
    $client = factory('App\Client')->create();
    return [
        'user_id'     => $client->user_id,
        'client_id'   => $client->id,
        'particular'  => $faker->name,
        'amount'      => $faker->numberBetween(100,5000000),
    ];
});
