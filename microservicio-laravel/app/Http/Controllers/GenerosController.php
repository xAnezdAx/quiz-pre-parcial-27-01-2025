<?php

namespace App\Http\Controllers;

use App\Models\generos;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $generos = Generos::with('bandas')->get();
        // $generos = Generos::all();
        return response()->json($generos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $genero = Generos::with('bandas')->find($id);

        if (!$genero) {
            return response()->json(['error' => 'Género no encontrado'], 404);
        }

        return response()->json($genero);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(generos $generos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, generos $generos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(generos $generos)
    {
        //
    }
}
