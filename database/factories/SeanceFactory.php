<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seance;
use Faker\Generator as Faker;
use App\Groupe;
use App\Enseignant;
$factory->define(Seance::class, function (Faker $faker) {
    return [
        'module'=>$faker->asciify('***'),
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'id_groupe' => Groupe::inRandomOrder()->get()->first()->id,
        'duree' => 120,
        'id_enseignant' => Enseignant::inRandomOrder()->get()->first()->id


    ];
});
