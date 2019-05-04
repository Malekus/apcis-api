<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Caf::class, function (Faker $faker) {
    return [
        'dateCaf' =>  $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
        'motif_id' =>  \App\Configuration::where(['categorie' => 'Caf', 'champ' => 'Motif'])->get()->random()->id,
        'personne_id' => \App\Personne::all()->random()->id,
    ];
});
