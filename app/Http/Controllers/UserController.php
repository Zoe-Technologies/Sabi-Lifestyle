<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

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
        return view('users.products.index', compact('user', 'products', 'categories'));
    }

    public function showProducts(Product $product, $id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.show', compact('user', 'product', 'categories'));
    }
}
