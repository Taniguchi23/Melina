<?php

namespace App\Http\Controllers;

use App\Models\Distrito;
use App\Models\Region;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function index (){
        $distritos = Distrito::all();
        return view('distrito.index', compact('distritos'));
    }
    public function create (){
        $regiones = Region::all();
        return view('distrito.create', compact('regiones'));
    }
    public function store (Request $request){
        $distrito = new Distrito;
        $distrito->nombre = $request->nombre;
        $distrito->url_seo = $request->url_seo;
        $distrito->region_id = $request->region_id;
        $distrito->save();
        return redirect()->route('distrito.index');
    }
    public function edit ($id){
        $distrito = Distrito::find($id);

        $datos = [
            'distrito' => $distrito,
            'regiones' => Region::all(),
            'solo' => Region::find($distrito->region_id),
        ];
        return view('distrito.edit',$datos);
    }
    public function update (Request $request, $id){
        $distrito = Distrito::find($id);
        $distrito->nombre = $request->nombre;
        $distrito->url_seo = $request->url_seo;
        $distrito->region_id = $request->region_id;
        $distrito->estado = $request->estado;
        $distrito->save();
        return redirect()->route('distrito.index');
    }
    public function delete($id){
        $distrito = Distrito::find($id);
        $distrito->delete();
        return redirect()->route('distrito.index');
    }
}
