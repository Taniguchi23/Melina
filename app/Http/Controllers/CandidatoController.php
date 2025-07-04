<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use App\Models\Distrito;
use App\Models\Evento;
use App\Models\Partido;
use Illuminate\Http\Request;

class CandidatoController extends Controller
{
    public function index(){
        $candidatos = Candidato::all();
        return view('candidato.index', compact('candidatos'));
    }
    public function create(){
        $datos = [
            'distritos' => Distrito::all(),
            'partidos' => Partido::all(),
        ];
          return view('candidato.create',$datos);
    }
    public function store(Request $request){
        $candidato = new Candidato;
        $candidato->nombre = $request->nombre;
        $candidato->distrito_id = $request->distrito_id;
        $candidato->partido_id = $request->partido_id;

        if (isset($request->imagen)){
            $candidato->imagen = $request->file('imagen')->store('public/candidatos');
        }
        $candidato->save();
        $distrito = Distrito::find($request->distrito_id);
        $evento = Evento::where('slug',$distrito->url_seo)->orderby('id','desc')->first();
        $cand = Candidato::where('distrito_id',$request->distrito_id)->orderby('id','desc')->first();
        $dato = new Dato;
        $dato->candidato_id = $cand->id;
        $dato->evento_id = $evento->id;
        $dato->votos = 0;
        $dato->save();
        return redirect()->route('candidato.index');
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
        if(isset($request->imagen)){
            if($candidato->imagen==null){
                $candidato->imagen=$request->file('imagen')->store('public/candidatos');
            }else{
                Storage::delete($candidato->imagen);
                $candidato->imagen=$request->file('imagen')->store('public/candidatos');
            }
        }
        $candidato->save();
        return redirect()->route('candidato.index');

    }
    public function delete($id){
        $candidato = Candidato::find($id);
        $candidato->delete();
        return redirect()->route('candidato.index');
    }
}
