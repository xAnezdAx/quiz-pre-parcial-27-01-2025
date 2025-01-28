<?php

use App\Http\Controllers\LabelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
Route::prefix('bandas')->group(function () {
    Route::get('/', function () {
        return Http::get('http://127.0.0.1:8001/api/bands');
    });
    Route::get('{id}', function ($id) {
        return Http::get("http://127.0.0.1:8001/api/bands/{$id}");
    });
});

Route::prefix('generos')->group(function () {
    Route::get('/', function () {
        return Http::get('http://127.0.0.1:8001/api/genres');
    });
    Route::get('{id}', function ($id) {
        return Http::get("http://127.0.0.1:8001/api/genres/{$id}");
    });
});


Route::get('/record_labels',[LabelController::class, 'index']);
Route::post('/generate_labels/{n}',[LabelController::class,'store']);
