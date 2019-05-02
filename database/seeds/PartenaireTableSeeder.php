<?php

use Illuminate\Database\Seeder;

class PartenaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Partenaire::class, 100)->create();
    }
}
