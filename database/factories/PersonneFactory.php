<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Personne::class, function (Faker $faker) {
    return [
        'nom' => $faker->lastName,
        'prenom' => $faker->name,
        'date_naissance' => $faker->dateTime,
        'sexe' => $faker->randomElement(['homme', 'femme']),
        'enfant' => $faker->numberBetween(0, 5),
        'nationalite' => $faker->country,
        'telephone' => $faker->phoneNumber,
        'email' => $faker->email,
        'adresse' => $faker->address,
        'code_postale' => $faker->postcode,
        'ville' => $faker->city,
        'prioritaire' => $faker->boolean,
        'matricule_caf' => $faker->randomNumber,
        'csp_id' => \App\Configuration::where('champ', 'CSP')->get()->random()->id,
        'categorie_id' => \App\Configuration::where('champ', 'Catégorie')->get()->random()->id,
        'logement_id' => \App\Configuration::where('champ', 'Logement')->get()->random()->id,
        'scolaire_id' => \App\Configuration::where('champ', 'Niveau Scolaire')->get()->random()->id,
        'situation_id' => \App\Configuration::where('champ', 'Situation')->get()->random()->id
    ];
});
