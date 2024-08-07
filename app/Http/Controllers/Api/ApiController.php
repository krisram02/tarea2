<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //
   
    public function index()
    {
        $peliculas = Movie::select(['id', 'title'])->get();
        return response()->json($peliculas);
    }

    public function ordenarPeliculas($orden)
    {
        // Validar el parámetro de orden
        $orden = strtolower($orden);
        if ($orden !== 'asc' && $orden !== 'desc') {
            return response()->json(['error' => 'Orden no válido. Use "asc" o "desc".'], 400);
        }
    
        // Obtener las películas en el orden especificado
        $peliculas = Movie::select(['id', 'title'])->orderBy('id', $orden)->get();
    
        return response()->json($peliculas);
    }
    

    public function movie($idPelicula)
    {
        $pelicula = Movie::find($idPelicula);
        $peliculas = Movie::select(['id', 'title'])->where('id', $idPelicula)->get();
        return response()->json($peliculas);
    }

    public function update(Request $request, $idPelicula)
    {
        $pelicula = Movie::find($idPelicula);
        $pelicula->update($request->all());
        return response()->json($pelicula);
    }
    
}
