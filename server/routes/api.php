<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Register
Route::any('/register', [\App\Http\Controllers\RegisterController::class, 'register']);

// Login / Logout
Route::post('/login', [\App\Http\Controllers\LoginController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function() {
    Route::post('/validate_token', [\App\Http\Controllers\LoginController::class, 'validateToken']);
    Route::post('/logout', [\App\Http\Controllers\LoginController::class, 'logout']);

    // Some resources
    Route::get('/data', [\App\Http\Controllers\DataController::class, 'get']);
});


