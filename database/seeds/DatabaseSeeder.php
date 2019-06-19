<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        
        $this->call(SongTypesTableSeeder::class);
        $this->call(SingersTableSeeder::class);
        $this->call(HomeMusicsTableSeeder::class);
        $this->call(SongsTableSeeder::class);
        $this->call(AlbumsTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(MediosTableSeeder::class);
        
    }
}
