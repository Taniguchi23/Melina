<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function index(){

        $registros =  Dato::all();
        $datos = [
            'datos' => $registros,
        ];
        return view('dato.index',$datos);
    }
    public function buscar (Request $request){

        $candidatos = Candidato::where('nombre','like',"%$request->palabra%")->get();
            foreach ($candidatos as $candidato){
                $d[] = [
                    'id' => $candidato->id,
                ];
            }

       $datos = Dato::wherein('candidato_id',$d)->get();

        return view('dato.index',compact('datos'));
    }
    public function edit($id){
        $dato = Dato::find($id);
        return view('dato.edit',compact('dato'));
    }
    public function update($id, Request $request){
        $dato = Dato::find($id);
        $dato->votos = $request->votos;
        $dato->save();
        return redirect()->route('dato.index');
    }
}
