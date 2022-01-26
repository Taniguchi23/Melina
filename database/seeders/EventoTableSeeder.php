<?php

namespace Database\Seeders;

use App\Models\Evento;
use Illuminate\Database\Seeder;

class EventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventos = [
            [
                'slug' => "ate",
                'titulo' => "ATE Encuesta Virtual Diciembre 2021",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de diciembre del 2021",
                'fecha' => "diciembre-2021",
                'total_votos' => 300,
            ],
            [
                'slug' => "cieneguilla",
                'titulo' => "CIENEGUILLA Encuesta Virtual Diciembre 2021",
                'fecha' => "diciembre-2021",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de diciembre del 2021",
                'total_votos' => 300,
            ],
            [
                'slug' => "chaclacayo",
                'titulo' => "CHACLACAYO Encuesta Virtual Diciembre 2021",
                'fecha' => "diciembre-2021",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de diciembre del 2021",
                'total_votos' => 300,
            ],
            [
                'slug' => "ate",
                'titulo' => "ATE Encuesta Virtual Enero 2022",
                'fecha' => "enero-2022",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de enero del 2022",
                'total_votos' => 300,
            ],
            [
                'slug' => "cieneguilla",
                'titulo' => "CIENEGUILLAEncuesta Virtual Enero 2022",
                'fecha' => "enero-2022",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de enero del 2022",
                'total_votos' => 300,
            ],
            [
                'slug' => "chaclacayo",
                'titulo' => "CHACLACAYO Encuesta Virtual Enero 2022",
                'fecha' => "enero-2022",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de enero del 2022",
                'total_votos' => 300,
            ],
        ];
        Evento::insert($eventos);
    }
}
