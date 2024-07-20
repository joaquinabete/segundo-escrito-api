<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonaController;    

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/personas', [PersonaController::class, 'index']); 
Route::post('/personas', [PersonaController::class, 'store']);  
Route::get('/personas/{id}', [PersonaController::class, 'show']); 
Route::delete('/personas/{id}', [PersonaController::class, 'destroy']); 
Route::put('/personas/{id}', [PersonaController::class, 'update']); 
