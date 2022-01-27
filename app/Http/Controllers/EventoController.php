<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Evento;
use App\Models\Partido;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index(){
       $eventos = Evento::all();
       return view('evento.index', compact('eventos'));
    }
    public function create(){
       return view('evento.create');
    }
    public function store(Request $request){
        $request->imagen = "public/distrito/".$request->imagen."png";
       $evento = new Evento;
       $evento->titulo = $request->titulo;
       $evento->slug = $request->slug;
       $evento->contenido = $request->contenido;
       $evento->descripcion = $request->descripcion;
       $evento->imagen = $request->imagen;
       $evento->fecha = $request->fecha;

       $evento->save();
       return redirect()->route('evento.index');
    }
    public function edit($id){
        $evento = Evento::find($id);
         //public/distrito/ = 16
         $datos = [
             'evento' => $evento,
             'imagen' => substr($evento->imagen,16),
         ];

         return view('evento.edit', $datos);
    }
    public function update(Request $request, $id){
        $request->imagen = "public/distrito/".$request->imagen.".png";
        $evento = Evento::find($id);
        $evento->titulo = $request->titulo;
        $evento->slug = $request->slug;
        $evento->contenido = $request->contenido;
        $evento->fecha = $request->fecha;
        $evento->imagen = $request->imagen;
        $evento->save();
        return redirect()->route('evento.index');
    }
    public function delete($id){
        $evento = Evento::find($id);
        $evento->delete();
        return redirect()->route('evento.index');
    }
}
