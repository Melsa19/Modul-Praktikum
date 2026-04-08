<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// HALAMAN UTAMA: Langsung muncul daftar tiket kereta
Route::get('/', [ProductController::class, 'landing']);
Route::get('landing', [ProductController::class, 'landing']);

// AUTHENTICATION [cite: 99]
Route::get('login', [AuthController::class, 'showLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

// FITUR YANG BUTUH LOGIN [cite: 103]
Route::middleware('auth')->group(function () {
    // Keranjang [cite: 118]
    Route::get('cart', [CartController::class, 'index'])->name('cart');
    Route::get('cart/add/{id}', [CartController::class, 'add']);
    Route::get('cart/remove/{id}', [CartController::class, 'remove']);

    // Admin Panel [cite: 106]
    Route::get('admin', [ProductController::class, 'index'])->name('admin');
    Route::post('admin/product', [ProductController::class, 'store']);
    Route::get('admin/product/delete/{id}', [ProductController::class, 'destroy']);
    Route::get('setup-kategori', [ProductController::class, 'setupCategory']);
});