<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Medio;
use Faker\Generator as Faker;

$factory->define(Medio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});
