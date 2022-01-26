<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regiones = [
            [
                'nombre' => "Lima Este",
                'url_seo' => "lima-este",
            ],
            [
                'nombre' => "Lima Norte",
                'url_seo' => "lima-norte",
            ],
        ];
        Region::insert($regiones);
    }
}
