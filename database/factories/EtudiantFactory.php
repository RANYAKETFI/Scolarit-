<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Etudiant;
use Faker\Generator as Faker;
use App\Groupe;

$factory->define(Etudiant::class, function (Faker $faker) {

        return [
            'nom'=> $faker->lastName,
            'prenom'=> $faker->unique()->firstName,
            'login'=>$faker->safeEmail,
            'mdp'=>$faker->asciify('***'),
            'dob'=>$faker->date($format = 'Y-m-d', $max = 'now'),
            'id_groupe'=>Groupe::inRandomOrder()->get()->first()->id

        ];

});
