<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Pubto b
Route::get('/peliculas', [ApiController::class, 'index']);
//Punto c
Route::get('/peliculas/{orden}', [ApiController::class,'ordenarPeliculas']);

//Punto d
Route::get('/movie/{idPelicula}', [ApiController::class, 'movie']);
//Punto e
Route::put('/update/{idPelicula}', [ApiController::class, 'update']);


