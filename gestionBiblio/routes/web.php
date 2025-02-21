<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;


// home route
Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/signup', [AuthController::class, 'showSinUp']);
Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/signup', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Crud routes
Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
