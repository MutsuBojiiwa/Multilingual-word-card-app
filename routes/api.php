<?php

use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\AuthController;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeckController;


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

Route::get('/health', [HealthCheckController::class, 'health']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::apiResource('decks', DeckController::class);


// Route::middleware('auth:api')->get('users', function () {
//     $users = User::all();
//     return response()->json([
//         'data' => $users
//     ]);

// });

// Route::get('/check-jwt-secret', function () {
//     return response()->json(['jwt_secret' => env('JWT_SECRET')]);
// });

// Route::get('/check-environment', function () {
//     return response()->json([
//         'environment' => $_ENV,
//     ]);
// });
