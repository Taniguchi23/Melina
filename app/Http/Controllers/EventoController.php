<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Dato;
use App\Models\Distrito;
use App\Models\Evento;
use App\Models\Partido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Mime\Encoder\EightBitContentEncoder;

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
        $valor = Evento::all();
        $distritos = Distrito::all();

        foreach ($distritos as $distrito){

            $evento = new Evento;
            $evento->titulo = $request->titulo;
            $evento->slug = $distrito->url_seo;
            $evento->contenido = $request->contenido;
            $evento->descripcion = $request->descripcion;
            $evento->imagen = $distrito->imagen;
            $evento->fecha = $request->fecha;
            $evento->save();

            $candidatos = Candidato::where('distrito_id',$distrito->id)->get();
            $total = rand(600,1000);
            foreach ($candidatos as $candidato){

                $dato = new Dato;
                $dato->candidato_id = $candidato->id;
                $dato->evento_id = $evento->id;
                if ($valor->isNotEmpty()){
                    $dato->votos = 0;
                }else{
                    $dato->votos = ceil(($total*floatval($candidato->voto))/100);
                }
                $dato->save();

            }
        }

       return redirect()->route('evento.index');
    }
    public  function  edit_all(){

    }
    public function edit($id){
        $evento = Evento::find($id);
         //public/distrito/ = 16
         $datos = [
             'evento' => $evento,
         ];

         return view('evento.edit', $datos);
    }
    public function update(Request $request, $id){
      //  $request->imagen = "public/distrito/".$request->imagen.".png";
        $evento = Evento::find($id);
        if(isset($request->imagen)){
           if ($evento->estado=='N'){
               $evento->imagen = $request->file('imagen')->store('public/resultados');
               $evento->estado = 'E';
           }else{
               Storage::delete($evento->imagen);
               $evento->imagen = $request->file('imagen')->store('public/resultados');
           }
        }
        $evento->titulo = $request->titulo;
        $evento->slug = $request->slug;
        $evento->contenido = $request->contenido;
        $evento->fecha = $request->fecha;
        $evento->save();
        return redirect()->route('evento.index');
    }
    public function delete($id){
        $evento = Evento::find($id);
        $evento->delete();
        return redirect()->route('evento.index');
    }
}
