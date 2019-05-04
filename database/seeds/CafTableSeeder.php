<?php

use Illuminate\Database\Seeder;

class CafTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Caf::class, 300)->create();
    }
}
