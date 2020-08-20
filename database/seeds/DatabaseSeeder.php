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
        $this->call([
            ArtistsTableSeeder::class,
            TypesTableSeeder::class,
            LocalitiesTableSeeder::class,
            RolesTableSeeder::class,
            LocationsTableSeeder::class,
            ShowsTableSeeder::class,
        ]);
    }
}
