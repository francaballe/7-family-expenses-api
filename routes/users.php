<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

// Default route, protected by sanctum
/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */