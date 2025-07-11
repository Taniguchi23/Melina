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
use App\Http\Controllers\JobsController;
use App\Http\Controllers\DatosController;


//web
Route::get('/',[WebController::class,'index'])->name('index');
Route::get('/peru/{region}/{distrito}',[WebController::class,'eventos']);
Route::get('/peru/{region}/{distrito}/{fecha}',[WebController::class,'detalle']);
Route::get('/jobs/diario',[JobsController::class,'job']);
Route::get('/jobs/primero',[JobsController::class,'firstJob']);
Route::get('imagen',[WebController::class,'edit_all']);
Route::get('/llacta', function (){
    Artisan::call('storage:link');
});
// borrar caché de la aplicación
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// borrar caché de ruta
Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

// borrar caché de configuración
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

// borrar caché de vista
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});
Route::get('/monse',[ApiController::class,'geoip']);
Route::get('/geoip',function (){
   $geoipInfo = geoip()->getLocation($_SERVER['REMOTE_ADDR']);
   return $geoipInfo->toArray();
});
Route::get('/error',[WebController::class,'error'])->name('web.error');
Route::get('/api/lista/{id}',[ApiController::class, 'lista_candidato'])->name('api.lista');
Route::post('/api/votacion',[ApiController::class,'votacion'])->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);
Route::get('/api/resultados/{id}',[ApiController::class, 'resultado'])->name('api.lista');
Route::get('/prueba',[WebController::class,'prueba']);
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

    //datos
    Route::controller(DatosController::class)->group(function (){
        Route::get('/datos','index')->name('dato.index');
        Route::post('/datos/buscar','buscar')->name('dato.buscar');
        Route::get('/datos/editar/{id}','edit')->name('dato.edit');
        Route::post('/datos/actualizar/{id}','update')->name('datos.update');

    });
});

// Route::get('*',[WebController::class,'index']);
Route::fallback(function () {
   return redirect()->route('web.error');
});

