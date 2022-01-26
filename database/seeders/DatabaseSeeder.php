<?php

namespace Database\Seeders;

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
            UsersTableSeeder::class,
            RegionTableSeeder::class,
            DistritoTableSeeder::class,
            PartidoTableSeeder::class,
            CandidatoTableSeeder::class,
            EventoTableSeeder::class,
            DatoTableSeeder::class,
        ]);
    }
}
