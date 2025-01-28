<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BandasController;
use App\Http\Controllers\GenerosController;



Route::middleware(['filter'])->group(function () {
    Route::get('/bands', [BandasController::class, 'index']);
    Route::get('/bands/{id}', [BandasController::class, 'show']);

    Route::get('/genres', [GenerosController::class, 'index']);
    Route::get('/genres/{id}', [GenerosController::class, 'show']);
});
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
