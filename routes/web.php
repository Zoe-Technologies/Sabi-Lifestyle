<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::name('admin.')->prefix('admin')->group(function () {
            Route::get('', [DashboardController::class, 'adminDashboard'])->name('dashboard.admin');
            Route::name('category.')->prefix('category')->group(function () {
                Route::get('index', [CategoryController::class, 'index'])->name('index');
                Route::get('create', [CategoryController::class, 'create'])->name('create');
                Route::post('store', [CategoryController::class, 'store'])->name('store');
                Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
                Route::post('edit/{id}', [CategoryController::class, 'update'])->name('update');
                Route::get('{id}', [CategoryController::class, 'destroy'])->name('destroy');
            });

            Route::name('product.')->prefix('product')->group(function () {
                Route::get('index', [ProductController::class, 'index'])->name('index');
                Route::get('create', [ProductController::class, 'create'])->name('create');
                Route::get('show/{id}', [ProductController::class, 'show'])->name('show');
                Route::post('store', [ProductController::class, 'store'])->name('store');
                Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
                Route::post('edit/{id}', [ProductController::class, 'update'])->name('update');
                Route::get('{id}', [ProductController::class, 'destroy'])->name('destroy');
            });

            Route::name('inbox.')->prefix('inbox')->group(function () {
                Route::get('index', [InboxController::class, 'indexAdmin'])->name('index');
                Route::get('show/{id}', [InboxController::class, 'showAdmin'])->name('show');
            });
        });

        Route::name('user.')->prefix('user')->group(function () {
            Route::name('inbox.')->prefix('inbox')->group(function () {
                Route::get('index', [InboxController::class, 'indexUser'])->name('index');
                Route::get('show/{id}', [InboxController::class, 'showUser'])->name('show');
                Route::get('create', [InboxController::class, 'create'])->name('create');
                Route::post('store', [InboxController::class, 'store'])->name('store');
                Route::get('edit/{id}', [InboxController::class, 'edit'])->name('edit');
                Route::post('edit/{id}', [InboxController::class, 'update'])->name('update');
                Route::get('{id}', [InboxController::class, 'destroy'])->name('destroy');
            });
        });
    });
});

require __DIR__ . '/auth.php';
