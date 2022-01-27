<?php

namespace App\Http\Controllers;

use App\Models\Partido;
use Illuminate\Http\Request;


class PartidoController extends Controller
{
    public function index(){
        $partidos = Partido::all();
        return view('partido.index', compact('partidos'));
    }
    public function create(){

        return view('partido.create');
    }
    public function store(Request $request){
        $partido = new Partido;
        $partido->nombre = $request->nombre;
        $partido->siglas = $request->siglas;
        if (isset($request->imagen)){
            $partido->imagen = $request->file('imagen')->store('public/partidos');
        }
        $partido->save();
        return redirect()->route('partido.index');
    }
    public function edit($id){
        $partido = Partido::find($id);

        return view('partido.edit',compact('partido'));
    }
    public function update(Request $request, $id){
        $partido = Partido::find($id);
        $partido->nombre = $request->nombre;
        $partido->siglas = $request->siglas;

        if(isset($request->imagen)){
            if($partido->imagen==null){
                $partido->imagen=$request->file('imagen')->store('public/partidos');
            }else{
                Storage::delete($partido->imagen);
                $partido->imagen=$request->file('imagen')->store('public/partidos');
            }
        }
        $partido->save();
        return redirect()->route('partido.index');

    }
    public function delete($id){
        $partido = Partido::find($id);
        $partido->delete();
        return redirect()->route('partido.index');
    }
}
