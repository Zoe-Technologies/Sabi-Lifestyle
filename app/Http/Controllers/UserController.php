<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function dashboard() {
        $user = auth()->user();
        return view('users.dashboard', compact('user'));
    }

    public function products() {
        $user = auth()->user();
        $categories = Category::all();
        $products = Product::all();
        $carts = Cart::all()->where('user_id', $user->id);
        return view('users.products.index', compact('user', 'products', 'categories', 'carts'));
    }

    public function showProducts(Product $product, $id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $carts = Cart::all()->where('user_id', $user->id);
        return view('admin.products.show', compact('user', 'product', 'categories', 'carts'));
    }
}
