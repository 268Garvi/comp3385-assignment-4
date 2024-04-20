<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Fetch all movies
Route::get('/v1/movies', [MovieController::class, 'index']);

// Add a new movie
Route::post('/v1/movies', [MovieController::class, 'store']);
