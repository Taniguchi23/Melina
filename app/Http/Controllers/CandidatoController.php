<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
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
        $candidato = Candidato::find($id);
        return view('candidato.edit',compact('candidato'));
    }
    public function update(Request $request, $id){
        $candidato = Candidato::find($id);
        $candidato->nombre = $request->nombre;
        $candidato->distrito_id = $request->distrito_id;
        $candidato->partido_id =$request->partido_id;
        $candidato->save();
        return redirect()->route('candidato.index');

    }
    public function delete($id){
        $candidato = Candidato::find($id);
        $candidato->delete();
        return redirect()->route('candidato.index');
    }
}
