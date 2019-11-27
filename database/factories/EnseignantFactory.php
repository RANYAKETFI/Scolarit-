<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enseignant;
use Faker\Generator as Faker;

$factory->define(Enseignant::class, function (Faker $faker) {

    return [
        'nom' => $faker->lastName,
        'prenom' => $faker->unique()->firstName,
        'login' => $faker->safeEmail,
        'mdp' => $faker->asciify('***')

];
});
