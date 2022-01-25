<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\DistritoController;



Route::get('/',[WebController::class,'index']);


Auth::routes();

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
