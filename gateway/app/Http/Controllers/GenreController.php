<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class GenreController extends Controller
{
    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        // $this->apiUrl = env('MICROSERVICIO_API_URL');
        // $this->apiKey = env('API_KEY');
        $this->apiUrl = 'http://127.0.0.1:8001/api';
        $this->apiKey = 'PhyImTT6rIJE2BfydEYaeED9dY0B0';
    }

    public function index()
    {
        $url = $this->apiUrl . '/genres';
        $response = Http::withHeaders(['X-API-Key' => $this->apiKey])->get($url);
        return $response->json();
    }

    public function show($id)
    {
        $url = $this->apiUrl . "/genres/{$id}";
        $response = Http::withHeaders(['X-API-Key' => $this->apiKey])->get($url);
        return $response->json();
    }
}
