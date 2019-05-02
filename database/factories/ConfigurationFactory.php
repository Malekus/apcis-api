<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Configuration::class, function (Faker $faker) {
    return [
        'categorie' => $faker->word,
        'champ' => $faker->word,
        'libelle' => $faker->word,
    ];
});
