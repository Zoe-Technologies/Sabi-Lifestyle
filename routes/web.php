<?php

use App\Models\CartItem;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WishlistController;

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
        Route::middleware([AdminMiddleware::class])->group(function () {
            // Admin routes here
            Route::name('admin.')->prefix('admin')->group(function () {
                Route::get('', [AdminController::class, 'dashboard'])->name('dashboard.admin');
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
        });

        Route::name('user.')->prefix('user')->group(function () {
            Route::get('', [UserController::class, 'dashboard'])->name('dashboard.user');
            Route::name('inbox.')->prefix('inbox')->group(function () {
                Route::get('index', [InboxController::class, 'indexUser'])->name('index');
                Route::get('show/{id}', [InboxController::class, 'showUser'])->name('show');
                Route::get('create', [InboxController::class, 'create'])->name('create');
                Route::post('store', [InboxController::class, 'store'])->name('store');
                Route::get('edit/{id}', [InboxController::class, 'edit'])->name('edit');
                Route::post('edit/{id}', [InboxController::class, 'update'])->name('update');
                Route::get('{id}', [InboxController::class, 'destroy'])->name('destroy');
            });



            Route::name('product.')->prefix('product')->group(function () {
                Route::get('index', [UserController::class, 'products'])->name('index');
                Route::get('show/{id}', [UserController::class, 'showProducts'])->name('show');
            });

            
            Route::name('cart.')->prefix('cart')->group(function () {
                Route::get('index', [CartItemController::class, 'index'])->name('index');
                Route::post('store', [CartItemController::class, 'store'])->name('store');
                Route::get('show/{id}', [CartItemController::class, 'showProducts'])->name('show');
                Route::get('{id}', [CartItemController::class, 'destroy'])->name('destroy');
            });

            Route::name('wishlist.')->prefix('wishlist')->group(function () {
                Route::get('index', [WishlistController::class, 'index'])->name('index');
                Route::post('store', [WishlistController::class, 'store'])->name('store');
                Route::get('show/{id}', [WishlistController::class, 'showProducts'])->name('show');
                Route::get('{id}', [WishlistController::class, 'destroy'])->name('destroy');
            });

            Route::name('order.')->prefix('order')->group(function () {
                Route::get('index', [OrderController::class, 'index'])->name('index');
                Route::post('store', [OrderController::class, 'store'])->name('store');
                Route::get('show/{id}', [OrderController::class, 'show'])->name('show');
                Route::get('{id}', [OrderController::class, 'destroy'])->name('destroy');
            });

        });
    });
});

require __DIR__ . '/auth.php';
