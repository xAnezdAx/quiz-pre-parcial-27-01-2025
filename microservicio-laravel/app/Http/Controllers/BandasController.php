<?php

namespace App\Http\Controllers;

use App\Models\bandas;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BandasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $bandas = Bandas::all();
        return response()->json($bandas);
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
        $banda = Bandas::find($id);

        if (!$banda) {
            return response()->json(['error' => 'Banda no encontrada'], 404);
        }

        return response()->json($banda);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bandas $bandas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bandas $bandas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bandas $bandas)
    {
        //
    }
}
