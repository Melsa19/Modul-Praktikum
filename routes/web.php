<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

