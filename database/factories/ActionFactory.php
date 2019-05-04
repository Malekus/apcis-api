<?php

use Faker\Generator as Faker;

$factory->define(\App\Action::class, function (Faker $faker) {
    return [
        'avancement' => $faker->randomElement(["en cours", "terminé"]),
        'dateAction' => $faker->dateTimeBetween($startDate = '-3 years', $endDate = 'now'),
        'duree' => $faker->randomElement([0, 5, 10, 15, 20, 25, 30, 35, 45, 50, 55, 60]),
        'deplacement' => $faker->randomElement([true, false]),
        'information' => $faker->randomElement([true, false]),
        'droitOuvert' => $faker->randomElement([true, false]),
        'maintienDroit' => $faker->randomElement([true, false]),
        'conflit' => $faker->randomElement([true, false]),
        'perduDeVue' => $faker->randomElement([true, false]),
        'judiciarisation' => $faker->randomElement([true, false]),
        'probleme_id' => \App\Probleme::all()->random()->id,
        'action_id' => \App\Configuration::where(['categorie' => 'Action', 'champ' => 'Action'])->get()->random()->id,
        'complement_id' => \App\Configuration::where(['categorie' => 'Action', 'champ' => 'Dirigé vers'])->get()->random()->id,
    ];
});
