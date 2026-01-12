<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();


// ROUTE API BUKU
Route::get('/allbooks', [BookController::class, 'index']);

    // ROUTE API BUKU
Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);

Route::get('/books/{id}', [BookController::class, 'show']);
Route::delete('/books/{id}', [BookController::class, 'destroy']);


// ROUTE PEMINJAMAN
Route::post('/dipinjam_buku', [LoanController::class, 'store']);
Route::put('/loans/{id}/return', [LoanController::class, 'returnBook']);

// AUTH
Route::post('/login', [AuthController::class, 'login']);

});
