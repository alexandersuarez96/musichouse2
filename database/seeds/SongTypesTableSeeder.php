<?php

use Illuminate\Database\Seeder;

class SongTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SongType::class,30)->create();
    }
}
