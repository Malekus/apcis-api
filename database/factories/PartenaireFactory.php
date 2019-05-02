<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Partenaire::class, function (Faker $faker) {
    return [
        'nom' => $faker->lastName ,
        'prenom' => $faker->name ,
        'sexe' => $faker->randomElement(['homme', 'femme']),
        'structure_id' => \App\Configuration::where(['champ' => 'Structure', 'categorie' => 'Partenaire'])->get()->random()->id,
        'type_id' => \App\Configuration::where(['champ' => 'Type', 'categorie' => 'Partenaire'])->get()->random()->id,
    ];
});
