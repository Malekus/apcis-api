<?php

use Illuminate\Database\Seeder;

class ProblemeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Probleme::class, 200)->create();
    }
}
