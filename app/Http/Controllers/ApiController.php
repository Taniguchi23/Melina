<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use App\Models\Distrito;
use App\Models\Evento;
use App\Models\Vote;
use Response;
use Illuminate\Http\Request;


class ApiController extends Controller
{
    public function lista_candidato($id){
        $candidatos = [];
        $datos = Dato::where('evento_id',$id)->get();
        foreach ($datos as $d){
            $candidatos[]= ['nombre' => $d->candidato->nombre, 'id' => $d->candidato->id] ;
        }
        return Response::json($candidatos, 200);
    }
    public function votacion (Request  $request){
         $vote = Vote::where('ip',$request->ip())->first();
         $fecha = strtotime($vote->created_at);
         var_dump($fecha);
         var_dump(time());
         var_dump((time()-$fecha)/3600);

         if (isset($vote) && (time()-$fecha)/3600 <= 24 ){
             return Response::json( ['status'=> 'error', 'message'=> 'vuelve a votar en 24 horas'], 400);
         } else{
             $dato = Dato::where('evento_id',$request->evento_id)->where('candidato_id',$request->candidato_id)->first();
             $dato->votos ++;
             $dato->save();

             $voto = new Vote;
             $voto->ip = $request->ip();
             $voto->evento_id = $request->evento_id;
             $voto->save();
             $evento = Evento::find($request->evento_id)->first();
             $evento->total_votos ++;
             $evento->save();

             return  Response::json( ['status'=> 'success'], 200);

         }

    }
    public function resultado($id){
        $candidatos = [];
        $datos = Dato::where('evento_id',$id)->get();
        foreach ($datos as $d){
            $candidatos[]= ['nombre' => $d->candidato->nombre, 'id' => $d->candidato->id ,'votos'=> $d->candidato->votos] ;
        }
        return Response::json($candidatos, 200);
    }
}
