<?php

use Illuminate\Database\Seeder;

class HomeMusicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\HomeMusic::class,30)->create();
    }
}
