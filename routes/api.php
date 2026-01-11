<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\Api\AnggotaApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    // ROUTE API BUKU
Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::put('/books/{id}', [BookController::class, 'update']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);
Route::post('/login', [AuthController::class, 'login']);
});

