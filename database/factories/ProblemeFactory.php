<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Probleme::class, function (Faker $faker) {
    return [
        'personne_id' => \App\Personne::all()->random()->id,
        'dateProbleme' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
        'resolu' => $faker->randomElement([true, false]),
        'categorie_id' => \App\Configuration::where(['categorie' => 'Problème', 'champ' => 'Catégorie'])->get()->random()->id,
        'type_id' => \App\Configuration::where(['categorie' => 'Problème', 'champ' => 'Type'])->get()->random()->id,
        'accompagnement_id' => \App\Configuration::where(['categorie' => 'Problème', 'champ' => 'Accompagnement'])->get()->random()->id,
    ];
});
