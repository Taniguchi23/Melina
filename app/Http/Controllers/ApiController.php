<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use App\Models\Distrito;
use App\Models\Evento;
use App\Models\Vote;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Response;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function lista_candidato($id){
        $candidatos = [];
        $datos = Dato::where('evento_id',$id)->get();
        $estado = 0;
        foreach ($datos as $d){
            if ($d->candidato->imagen == null){
                $valor_c = null;
                $valor_p = null;
            }else{
                $valor_c = Storage::url($d->candidato->imagen);
                $valor_p = Storage::url($d->candidato->partido->imagen);

            }
            $candidatos[]= ['nombre' => $d->candidato->nombre, 'id' => $d->candidato->id, 'imagen_candidato'=> $valor_c ,'imagen_partido'=>$valor_p    ] ;
        }
        return Response::json($candidatos, 200);
    }

    public function votacion (Request  $request){
        $req = json_decode(file_get_contents("php://input"));
        $ip = $request->ip();
        $geoip = geoip()->getLocation();
        if($geoip['iso_code'] != "PE"){
            return Response::json(['status' => 'error', 'message' => 'vuelve a votar en 24 horas'], 400);
        }

        if(isset($req) && isset($ip)) {
            $vote = Vote::where('ip', $request->ip())->where('evento_id',$req->evento_id)->first();

            if (isset($vote) && (time() - strtotime($vote->created_at)) / 3600 <= 24) {
                return Response::json(['status' => 'error', 'message' => 'vuelve a votar en 24 horas'], 400);
            } else {
                $dato = Dato::where('evento_id', $req->evento_id)->where('candidato_id', $req->candidato_id)->first();
                $dato->votos++;
                $dato->save();

                $voto = new Vote;
                $voto->ip = $request->ip();
                $voto->evento_id = $req->evento_id;
                $voto->save();

                $evento = Evento::find($req->evento_id)->first();
                $evento->total_votos++;
                $evento->save();

                return Response::json(['status' => 'success'], 200);

            }
        }
    }

    public function resultado($id){
        $total= 0;
        $candidatos = [];
        $datos = Dato::where('evento_id',$id)->orderByDesc('votos')->get();
        //foreach ($datos as $d){
        //  $total += $d->votos;
        //}
        foreach ($datos as $d){
            if ($d->candidato->imagen == null){
                $valor_c = null;
                $valor_p = null;
            }else{
                $valor_c = Storage::url($d->candidato->imagen);
                $valor_p = Storage::url($d->candidato->partido->imagen);
            }
            $candidatos[]= ['nombre' => $d->candidato->nombre, 'id' => $d->candidato->id ,'votos'=> $d->votos, 'imagen_candidato'=> $valor_c ,'imagen_partido'=>$valor_p,
                'color' => 'rojo'] ;
        }
        return Response::json($candidatos, 200);
    }

    public function geoip(Request $request){
        $ip = $request->ip();
        $geoip = geoip()->getLocation();
        dd($geoip);
    }


}
