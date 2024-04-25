<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([

            ModuleSeeder::class,
            SubModuleSeeder::class,
            PermissionSeeder::class,
            CountriesTableSeeder::class,
           StatesTableSeeder::class,
           CitiesTableSeeder::class,
        ]);
    }
}
