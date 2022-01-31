<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\DistritoController;
use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\PartidoController;
use Illuminate\Support\Facades\Artisan;


//web
Route::get('/',[WebController::class,'index']);
Route::get('/peru/{region}/{distrito}',[WebController::class,'eventos']);
Route::get('/peru/{region}/{distrito}/{fecha}',[WebController::class,'detalle']);
Route::get('/llacta', function (){
    Artisan::call('storage:link');
});

Route::get('/api/lista/{id}',[ApiController::class, 'lista_candidato'])->name('api.lista');
Route::post('/api/votacion',[ApiController::class,'votacion'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/api/resultados/{id}',[ApiController::class, 'resultado'])->name('api.lista');

Auth::routes();
Route::group(['middleware'=> 'auth'], function (){
    Route::get('/home', [AdminController::class, 'index'])->name('home');
    
    //regiones
    Route::get('/regiones',[RegionController::class,'index'])->name('region.index');
    Route::get('/regiones/crear',[RegionController::class,'create'])->name('region.create');
    Route::post('/regiones/guardar',[RegionController::class,'store'])->name('region.store');
    Route::get('/regiones/editar/{id}',[RegionController::class,'edit'])->name('region.edit');
    Route::post('/regiones/actualizar/{id}',[RegionController::class,'update'])->name('region.update');
    Route::get('/regiones/{id}',[RegionController::class,'delete'])->name('region.delete');
    
    //distritos
    Route::get('/distritos',[DistritoController::class,'index'])->name('distrito.index');
    Route::get('/distritos/crear',[DistritoController::class,'create'])->name('distrito.create');
    Route::post('/distritos/guardar',[DistritoController::class,'store'])->name('distrito.store');
    Route::get('/distritos/editar/{id}',[DistritoController::class,'edit'])->name('distrito.edit');
    Route::post('/distritos/actualizar/{id}',[DistritoController::class,'update'])->name('distrito.update');
    Route::get('/distritos/{id}',[DistritoController::class,'delete'])->name('distrito.delete');
    
    //candidato
    Route::get('/candidatos',[CandidatoController::class,'index'])->name('candidato.index');
    Route::get('/candidatos/crear',[CandidatoController::class,'create'])->name('candidato.create');
    Route::post('/candidatos/guardar',[CandidatoController::class,'store'])->name('candidato.store');
    Route::get('/candidatos/editar/{id}',[CandidatoController::class,'edit'])->name('candidato.edit');
    Route::post('/candidatos/actualizar/{id}',[CandidatoController::class,'update'])->name('candidato.update');
    Route::get('/candidatos/{id}',[CandidatoController::class,'delete'])->name('candidato.delete');
    
    //eventos
    Route::get('/eventos',[EventoController::class,'index'])->name('evento.index');
    Route::get('/eventos/crear',[EventoController::class,'create'])->name('evento.create');
    Route::post('/eventos/guardar',[EventoController::class,'store'])->name('evento.store');
    Route::get('/eventos/editar/{id}',[EventoController::class,'edit'])->name('evento.edit');
    Route::post('/eventos/actualizar/{id}',[EventoController::class,'update'])->name('evento.update');
    Route::get('/eventos/{id}',[EventoController::class,'delete'])->name('evento.delete');
    
    //partidos
    Route::controller(PartidoController::class)->group(function (){
        Route::get('/partidos','index')->name('partido.index');
        Route::get('/partidos/crear','create')->name('partido.create');
        Route::post('/partidos/guardar','store')->name('partido.store');
        Route::get('partidos/editar/{id}','edit')->name('partido.edit');
        Route::post('/partidos/actualizar/{id}','update')->name('partido.update');
        Route::get('/partidos/{id}','delete')->name('partido.delete');
    });
});

// Route::get('*',[WebController::class,'index']);


