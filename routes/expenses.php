<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpensesController;


Route::get('expenses', [ExpensesController::class, 'index']);
Route::get('expenses/{id}', [ExpensesController::class, 'show']);
Route::post('expenses', [ExpensesController::class, 'store']);
Route::put('expenses/{id}', [ExpensesController::class, 'update']);
Route::delete('expenses/{id}', [ExpensesController::class, 'destroy']);