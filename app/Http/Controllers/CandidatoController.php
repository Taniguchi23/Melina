<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Distrito;
use App\Models\Partido;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    public function index(){
        $candidatos = Candidato::all();
        return view('candidato.index', compact('candidatos'));
    }
    public function create(){

    }
    public function store(Request $request){

    }
    public function edit($id){
        $datos = [
            'candidato' => Candidato::find($id),
            'distritos' => Distrito::all(),
            'partidos' => Partido::all(),
        ];
        return view('candidato.edit',$datos);
    }
    public function update(Request $request, $id){
        $candidato = Candidato::find($id);
        $candidato->nombre = $request->nombre;
        $candidato->distrito_id = $request->distrito_id;
        $candidato->partido_id = $request->partido_id;
        $candidato->save();
        return redirect()->route('candidato.index');

    }
    public function delete($id){
        $candidato = Candidato::find($id);
        $candidato->delete();
        return redirect()->route('candidato.index');
    }
}
