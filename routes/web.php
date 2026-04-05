<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman utama
Route::get('/', function () {
    return view('index');
})->name('home');

// Halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');

// Proses logout (Wajib pakai GET)
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');