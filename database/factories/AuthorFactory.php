<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name,
        'fecha'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'nacionalidad'=>$faker->country,
        'sexo'=>$faker->randomElement(['Masculino','Femenino']),
    ];
});
