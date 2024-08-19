<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Menampilkan form registrasi
Route::get('/register', [RegisteredUserController::class, 'index'])->name('register.index');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// Routes Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Kelompokkan routes yang memerlukan autentikasi
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // Menampilkan daftar pengguna
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    
    // Routes untuk barang inventaris
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

    Route::get('/item-categories', [ItemCategoryController::class, 'index'])->name('item-categories.index');
    Route::post('/item-categories', [ItemCategoryController::class, 'store'])->name('item-categories.store');
    Route::put('/item-categories/{id}', [ItemCategoryController::class, 'update'])->name('item-categories.update');
    Route::delete('/item-categories/{id}', [ItemCategoryController::class, 'destroy'])->name('item-categories.destroy');

    // Routes untuk kategori barang
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

    // Routes untuk transaksi
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update'])->name('transactions.update');
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy'])->name('transactions.destroy');
});