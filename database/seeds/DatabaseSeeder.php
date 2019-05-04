<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ConfigurationTableSeeder::class,
            PersonneTableSeeder::class,
            PartenaireTableSeeder::class,
            ProblemeTableSeeder::class,
            ActionTableSeeder::class,
            //CafDateTableSeeder::class,
        ]);
    }
}
