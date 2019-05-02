<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ConfigurationTableSeeder::class,
            PersonnesTableSeeder::class,
            /*PartenaireTableSeeder::class,
            ProblemeTableSeeder::class,
            ActionTableSeeder::class,
            CafDateTableSeeder::class,*/
        ]);
    }
}
