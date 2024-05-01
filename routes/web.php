<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::name('admin.')->prefix('admin')->group(function () {
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
        });

        Route::name('user.')->prefix('user')->group(function () {

        });

    });
});

require __DIR__.'/auth.php';
