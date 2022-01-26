<?php

namespace Database\Seeders;

use App\Models\Distrito;
use Illuminate\Database\Seeder;

class DistritoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $distritos = [
            [
                'region_id' => 1,
                'url_seo' => "ate",
                'nombre' => "Ate",
            ],
            [
                'region_id' => 1,
                'url_seo' => "cieneguilla",
                'nombre' => "Cieneguilla",
            ],
            [
                'region_id' => 1,
                'url_seo' => "chaclacayo",
                'nombre' => "Chaclacayo",
            ],
            [
                'region_id' => 1,
                'url_seo' => "el-agustino",
                'nombre' => "El Agustino",
            ],
        ];
        Distrito::insert($distritos);
    }
}
