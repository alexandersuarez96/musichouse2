<?php

use Illuminate\Database\Seeder;

class MediosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Medio::class,30)->create();
    }
}
