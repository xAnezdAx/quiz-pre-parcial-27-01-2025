<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LabelController extends Controller
{

    protected $labelApiKey;
    protected $labelApiUrl;


    public function __construct()
    {
        $this->labelApiUrl = env('LABEL_API_URL');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $url = $this->labelApiUrl . '/record_labels';
        $response = Http::get($url);
        return $response->json();
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $url = $this->labelApiUrl . "/generate_labels/{$request->n}";
        $response = Http::post($url);
        return $response->json();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
