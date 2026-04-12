<?php

use Illuminate\Support\Facades\Route;

//Latihan Lkpd
use App\Http\Controllers\KelasController;

//Contoh di lkpd
use App\Http\Controllers\SiswaController;

  Route::get('/siswa',[SiswaController::class,'index']);
  Route::get('/siswa/create',[SiswaController::class,'create']);
  Route::post('/siswa',[SiswaController::class,'store']);
  Route::get('/siswa/edit/{id}',[SiswaController::class,'edit']);
  Route::patch('/siswa/{id}',[SiswaController::class,'update']);
  Route::delete('/siswa/{id}',[SiswaController::class,'destroy']);
  //Route::get('/nama-route',[NamaControlller::class,'Namafungsi'])

//Route::get('/percobaan', function () {
//    $variable = "isi variable"  
//    $variable = 1  
//    return view('namaView',compact('variable'));
//});

Route::get('/kelas', [KelasController::class,'index']);
Route::get('/kelas/create', [KelasController::class,'create']);
Route::post('/kelas', [KelasController::class,'store']);
Route::get('/kelas/edit/{id}',[KelasController::class,'edit']);
Route::patch('/kelas/{id}',[kelasController::class,'update']);
Route::delete('/kelas/{id}',[KelasController::class,'destroy']);


Route::get('/contoh', [KelasController::class,'routeSatu']);
Route::get('/contoh_lagi', [KelasController::class,'routeDua']);
Route::get('/contoh_terakhir', [KelasController::class,'routeTiga']);
