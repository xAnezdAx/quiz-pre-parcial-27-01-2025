<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;

class Filter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // $apiKey = Config::get('app.GOOGLE_GEOCODER_API_KEY');
        $apiKey = $request->header('X-API-Key');
        // $expectedApiKey = Config::get('API_KEY');
        $expectedApiKey = 'PhyImTT6rIJE2BfydEYaeED9dY0B0';

        if ($apiKey !== $expectedApiKey) {
            return response()->json([
                'message' => 'Acceso denegado. Clave API incorrecta.',
                $apiKey,
                $expectedApiKey
            ], 403);
        }

        return $next($request);
    }
}
