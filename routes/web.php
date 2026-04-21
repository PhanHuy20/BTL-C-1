<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CartController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/xe-may', [HomeController::class, 'motorcycles'])->name('home.motorcycles');
Route::get('/xe-may/{id}', [HomeController::class, 'showMotorcycle'])->name('home.motorcycles.show');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

    Route::resource('motorcycles', MotorcycleController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('payments', PaymentController::class);

    Route::middleware('role:admin')->group(function () {
        Route::resource('roles', RoleController::class)->except(['show']);
        Route::resource('users', UserController::class)->except(['show']);
        Route::resource('brands', \App\Http\Controllers\BrandController::class)->except(['show']);
        Route::resource('categories', \App\Http\Controllers\CategoryController::class)->except(['show']);

    });
    Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
});
});