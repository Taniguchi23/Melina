<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use App\Models\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function job (){
        $fecha = Carbon::now();
        $fecha_normal =  strtotime($fecha);
        $mes_numero = round(date("m",$fecha_normal))-1;
        $anio = date("Y", $fecha_normal);
        $mes = ["enero", "febrero", "marzo", "junio","julio","agosto","setiembre","noviembre","diciembre"];
        $fecha_slug = $mes[$mes_numero].'-'.$anio;
        $random = rand(40,80);

        $eventos = Evento::where('fecha',$fecha_slug)->get();
        if ($eventos->isnotempty()){
            foreach ($eventos as $evento){
                $contenedor = 0;
                $datos = Dato::where('evento_id',$evento->id)->get();
                foreach ($datos as $dato){
                    $contenedor += $dato->votos;
                }
                foreach ($datos as $d){
                    $porcentaje_nuevo = round(($d->votos*100)/$contenedor);
                    $voto_diario = round(($random*$porcentaje_nuevo)/100);
                    if ($voto_diario == 0){
                        $voto_diario = 3;
                    }
                    $d->votos = $d->votos + $voto_diario;
                    $d->save();
                }
            }
        }
    }
    public function firstJob(){
        $fecha = Carbon::now();
        $fecha_normal =  strtotime($fecha);
        $mes_numero = round(date("m",$fecha_normal))-1;
        $anio = date("Y", $fecha_normal);
        $mes = ["enero", "febrero", "marzo", "junio","julio","agosto","setiembre","noviembre","diciembre"];
        $fecha_slug = $mes[$mes_numero].'-'.$anio;
        $random = rand(60,100);

        $eventos = Evento::where('fecha',$fecha_slug)->get();
        if ($eventos->isnotempty()){
            foreach ($eventos as $evento){

                $datos = Dato::where('evento_id',$evento->id)->get();
                foreach ($datos as $d){
                    $candidato = Candidato::where('id',$d->candidato_id)->first();
                    $voto_diario = round(($random*$candidato->voto)/100);
                    if ($voto_diario == 0){
                        $voto_diario = rand(7,10);
                    }
                    $d->votos = $voto_diario;
                    $d->save();
                }
            }
        }
    }
}
