<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use App\Models\Distrito;
use App\Models\Evento;
use App\Models\Region;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index (){
        return view('web.index');
    }
    public function eventos($region,$distrito){
        $r= Region::where('url_seo',$region)->first();
        $eventos = Evento::where('slug',$distrito)->orderBy('created_at','desc')->get();
        $dato = [
            'eventos' => $eventos,

            'e' => Evento::where('slug',$distrito)->orderBy('created_at','desc')->get(),
            'distritos' => Distrito::where('region_id',$r->id)->get(),
            'distrito' => Distrito::where('url_seo',$distrito)->first(),
        ];
        return view('web.eventos',$dato);
    }
    public function detalle($region,$distrito, $fecha){
        $r= Region::where('url_seo',$region)->first();
      $evento = Evento::where('slug',$distrito)->where('fecha',$fecha)->first();
      $distrito_nombre= Distrito::where('url_seo',$distrito)->first();
      $candidatos = Candidato::where('distrito_id',$distrito_nombre->id)->get();
      $dato = [
          'evento' => $evento,
          'e' => Evento::where('slug',$distrito)->orderBy('created_at','desc')->get(),
          'distrito' => Distrito::where('url_seo',$distrito)->first(),
          'distritos' => Distrito::where('region_id',$r->id)->get(),
          'candidatos' => $candidatos,
      ];

      return view('web.detalle',$dato);
    }
}
