<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'duracion' => $faker->randomDigitNotNull,
        'singers_id'=>App\Models\Singer::all()->random()->id,
        'song_types_id'=>App\Models\SongType::all()->random()->id,
    ];
});
