<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\LoginController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/signup', [SignUpController::class, 'show']);
Route::get('/login', [LoginController::class, 'show']);


