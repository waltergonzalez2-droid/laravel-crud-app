<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de Productos
    Route::resource('products', ProductController::class);

    // Rutas de Roles
    Route::resource('roles', RoleController::class);

    // Rutas de Usuarios
    Route::resource('users', UserController::class);

    // Rutas de Reportes
    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/dashboard', [ReportController::class, 'dashboard'])->name('dashboard');
        Route::get('/products', [ReportController::class, 'productReport'])->name('products');
        Route::get('/stock', [ReportController::class, 'stockReport'])->name('stock');
    });
});

// Incluir rutas de autenticación de Breeze
require __DIR__.'/auth.php';
