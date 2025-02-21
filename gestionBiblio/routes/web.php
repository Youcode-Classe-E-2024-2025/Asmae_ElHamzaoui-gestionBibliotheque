<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;


// home route
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/signup', [AuthController::class, 'showSignUp']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Crud routes
Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
Route::get('/books/create', [BookController::class, 'create']);
Route::post('/books', [BookController::class, 'store']);
Route::put('/books/{book}', [BookController::class, 'update']);
Route::post('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');


// Route pour la redirection vers la page d'emprunt
Route::get('/emprunt', [BookController::class, 'showClientBooks'])->name('client.dashboard');

// Route pour l'emprunt
Route::post('/loans', [BookController::class, 'storeLoan'])->name('loans.store');
