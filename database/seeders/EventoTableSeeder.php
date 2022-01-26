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
                'descripcion' => "Esta encuesta comenzo el 01 al 31 de diciembre del 2021",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de diciembre del 2021",
                'imagen' => "public/distrito/ate.jfif",
                'fecha' => "diciembre-2021",
                'total_votos' => 300,
                'created_at' => '2021-12-01 01:53:27'
            ],
            [
                'slug' => "cieneguilla",
                'titulo' => "CIENEGUILLA Encuesta Virtual Diciembre 2021",
                'fecha' => "diciembre-2021",
                'descripcion' => "Esta encuesta comenzo el 01 al 31 de diciembre del 2021",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de diciembre del 2021",
                'imagen' => "public/distrito/ate.jfif",
                'total_votos' => 300,
                'created_at' => '2021-12-01 01:53:27'
            ],
            [
                'slug' => "ate",
                'titulo' => "ATE Encuesta Virtual Enero 2022",
                'fecha' => "enero-2022",
                'descripcion' => "Esta encuesta comenzo el 01 al 31 de enero del 2022",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de enero del 2022",
                'imagen' => "public/distrito/ate.jfif",
                'total_votos' => 300,
                'created_at' => '2022-01-01 01:53:27'
            ],
            [
                'slug' => "cieneguilla",
                'titulo' => "CIENEGUILLA Encuesta Virtual Enero 2022",
                'fecha' => "enero-2022",
                'descripcion' => "Esta encuesta comenzo el 01 al 31 de enero del 2022",
                'contenido' => "Esta encuesta comenzo el 01 al 31 de enero del 2022",
                'imagen' => "public/distrito/ate.jfif",
                'total_votos' => 300,
                'created_at' => '2022-01-01 01:53:27'
            ],

        ];
        Evento::insert($eventos);
    }
}
