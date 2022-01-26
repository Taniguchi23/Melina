<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use App\Models\Distrito;
use App\Models\Evento;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index (){
        return view('web.index');
    }
    public function eventos($distrito){
        $eventos = Evento::where('slug',$distrito)->get();
        $dato = [
            'eventos' => $eventos,
            'distrito' => Distrito::where('url_seo',$distrito)->first(),
        ];
        return view('web.eventos',$dato);
    }
    public function detalle($distrito, $fecha){
      $evento = Evento::where('slug',$distrito)->where('fecha',$fecha)->first();
      $distrito_nombre= Distrito::where('url_seo',$distrito)->first();
      $candidatos = Candidato::where('distrito_id',$distrito_nombre->id)->get();
      $dato = [
          'evento' => $evento,
          'distrito' => Distrito::where('url_seo',$distrito)->first(),
          'candidatos' => $candidatos,
      ];

      return view('web.detalle',$dato);
    }
}
