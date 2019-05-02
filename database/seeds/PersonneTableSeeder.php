<?php

use Illuminate\Database\Seeder;

class PersonneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Personne::class, 200)->create();
    }
}
