<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// Tambahkan baris ini untuk memanggil ProductController
use App\Http\Controllers\ProductController; 

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

// Route halaman produk
Route::get('/product', [ProductController::class, 'index'])->name('products');

// Route untuk memproses penyimpanan data produk baru
Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');