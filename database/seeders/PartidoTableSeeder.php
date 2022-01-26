<?php

namespace Database\Seeders;

use App\Models\Partido;
use Illuminate\Database\Seeder;

class PartidoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partidos = [
            [
                'nombre' => "Alianza para el Progreso",
            ],[
                'nombre' => "PPC",
            ],
        ];
        Partido::insert($partidos);
    }
}
