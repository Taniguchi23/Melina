<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use App\Models\Distrito;
use App\Models\Evento;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index (){
        $eventos = [];
        $distritos = Distrito::where('estado','A')->get();
        foreach ($distritos as $distrito){
            $eventos[] = [
                'evento' => Evento::where('slug',$distrito->url_seo)->orderBy('created_at','desc')->first(),
                'distrito' => $distrito,
            ];
        }


        return view('web.index', compact('eventos') );
    }
    public function eventos($region,$distrito){
        $r= Region::where('url_seo',$region)->first();
        $eventos = Evento::where('slug',$distrito)->orderBy('created_at','desc')->get();
        if ($r == null || !$eventos->isNotEmpty() ){
            return redirect()->route('web.error');
        }

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

        $fecha_cierre = strtotime($evento->fecha_cierre);
        $fecha_hoy = strtotime(Carbon::now());


        $distrito_nombre= Distrito::where('url_seo',$distrito)->first();


        if ($r == null || $evento== null || $distrito_nombre == null){
            return redirect()->route('web.error');
        }
        $candidatos = Candidato::where('distrito_id',$distrito_nombre->id)->get();
        $dato = [
            'evento' => $evento,
            'e' => Evento::where('slug',$distrito)->orderBy('created_at','desc')->get(),
            'distrito' => Distrito::where('url_seo',$distrito)->first(),
            'distritos' => Distrito::where('region_id',$r->id)->get(),
            'candidatos' => $candidatos,
            'total' =>  $fecha_cierre-$fecha_hoy,
        ];

        return view('web.detalle',$dato);
    }

    public function error (){
        return redirect()->route('index');
    }

    public  function  edit_all(){
        phpinfo();
    }
}
