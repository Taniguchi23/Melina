<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function index (){
         $regiones = Region::all();

         return view('region.index', compact('regiones'));
    }
    public function create (){
          return view('region.create');
    }
    public function store (Request $request){
       $region = new Region;
       $region->nombre = $request->nombre;
        $region->url_seo = $request->url_seo;
       $region->save();
       return redirect()->route('region.index');
    }
    public function edit ($id){
        $region = Region::find($id);
        return view('region.edit',compact('region'));
    }
    public function update (Request $request, $id){
        $region = Region::find($id);
        $region->nombre = $request->nombre;
        $region->url_seo = $request->url_seo;
        $region->save();
        return redirect()->route('region.index');
    }
    public function delete($id){
        $region = Region::find($id);
        $region->delete();
        return redirect()->route('region.index');
    }
}
