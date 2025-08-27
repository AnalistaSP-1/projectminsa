<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\TopographyControlador;
use App\Http\Controllers\MorfologiaControlador;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/diagnostic/search', [DiagnosticController::class, 'search']);

Route::get('/topography/search', [TopographyControlador::class, 'search']);

Route::get('/morfologia/search', [MorfologiaControlador::class, 'search']);
