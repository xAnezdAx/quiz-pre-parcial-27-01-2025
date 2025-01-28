<?php

use App\Http\Controllers\LabelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\BandController;
use App\Http\Controllers\GenreController;


Route::prefix('bandas')->group(function () {
    Route::get('/', [BandController::class, 'index']);
    Route::get('{id}', [BandController::class, 'show']);
});

Route::prefix('generos')->group(function () {
    Route::get('/', [GenreController::class, 'index']);
    Route::get('{id}', [GenreController::class, 'show']);
});


Route::get('/record_labels', [LabelController::class, 'index']);
Route::post('/generate_labels/{n}', [LabelController::class, 'store']);
