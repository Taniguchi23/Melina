<?php

namespace Database\Seeders;

use App\Models\Candidato;
use Illuminate\Database\Seeder;

class CandidatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $candidatos = [
            [
                'nombre' => "Dupuy",
                'distrito_id' => 1,
                'partido_id' => 1,
            ],
            [
                'nombre' => "Benavides",
                'distrito_id' => 1,
                'partido_id' => 2,
            ],
            [
                'nombre' => "Juancito",
                'distrito_id' => 2,
                'partido_id' => 1,
            ],
            [
                'nombre' => "Miguelito",
                'distrito_id' => 2,
                'partido_id' => 2,
            ],
        ];
        Candidato::insert($candidatos);
    }
}
