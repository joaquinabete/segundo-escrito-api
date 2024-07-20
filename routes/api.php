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

Route::get('/personas', [PersonaController::class, 'index']); // Index
Route::post('/personas', [PersonaController::class, 'store']);  // Store
Route::get('/personas/{id}', [PersonaController::class, 'show']); // Show
Route::delete('/personas/{id}', [PersonaController::class, 'destroy']); // Delete
Route::put('/personas/{id}', [PersonaController::class, 'update']); // Update


/* Route::patch('/personas/{id}', function() { // partialupdate
    return "Actualizando un dato de una persona";
}); */
