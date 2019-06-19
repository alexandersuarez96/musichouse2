<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Album;
use Faker\Generator as Faker;

$factory->define(Album::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name,
        'fecha'=> $faker->date($format = 'Y-m-d', $max = 'now'),
        'home_musics_id'=>App\Models\HomeMusic::all()->random()->id,
    ];
});
