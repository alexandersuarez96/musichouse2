<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\SongType;
use Faker\Generator as Faker;

$factory->define(SongType::class, function (Faker $faker) {
    return [
        'nombre'=>$faker->name,
        
    ];
});
