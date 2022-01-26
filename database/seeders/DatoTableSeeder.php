<?php

namespace Database\Seeders;

use App\Models\Dato;
use Illuminate\Database\Seeder;

class DatoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datos = [
            [
                'candidato_id' => 1,
                'evento_id' => 1,
                'votos' => 5,
            ],
            [
                'candidato_id' => 2,
                'evento_id' => 1,
                'votos' => 10,
            ],
            [
                'candidato_id' => 3,
                'evento_id' => 2,
                'votos' => 25,
            ],
            [
                'candidato_id' => 4,
                'evento_id' => 2,
                'votos' => 35,
            ],
            [
                'candidato_id' => 1,
                'evento_id' => 3,
                'votos' => 24,
            ],
            [
                'candidato_id' => 2,
                'evento_id' => 3,
                'votos' => 35,
            ],
            [
                'candidato_id' => 3,
                'evento_id' => 4,
                'votos' => 45,
            ],
            [
                'candidato_id' => 4,
                'evento_id' => 4,
                'votos' => 45,
            ],
            [
                'candidato_id' => 1,
                'evento_id' => 1,
                'votos' => 5,
            ],

        ];
        Dato::insert($datos);
    }
}
