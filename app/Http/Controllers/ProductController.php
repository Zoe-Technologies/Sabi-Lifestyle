<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use PhpParser\Builder\Property;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $products = Product::all();
        $categories = Category::all();
        return view('admin.products.index', compact('products', 'user', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $categories = Category::all();
        return view('admin.products.create', compact('user', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image[]' => 'mimes:jpg,png,jpeg,svg',
            'price_small' => 'required',
            'price_medium' => 'required',
            'price_large' => 'required',
            'price_xlarge' => 'required',
            'price_xxlarge' => 'required',
            'price_xxxlarge' => 'required',
            'quantity_small' => 'required',
            'quantity_medium' => 'required',
            'quantity_large' => 'required',
            'quantity_xlarge' => 'required',
            'quantity_xxlarge' => 'required',
            'quantity_xxxlarge' => 'required',
            'discount' => 'required',
        ]);

        $fileNames = [];
        foreach ($request->file('image') as $image) {
            $imageName = $image->hashName();
            $image->store('images/products', 'public');
            $fileNames[] = $imageName;
        }

        $images = $fileNames;

        $product = Product::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'images' => $images,
            'price_small' => $request->input('price_small'),
            'price_medium' => $request->input('price_medium'),
            'price_large' => $request->input('price_large'),
            'price_xlarge' => $request->input('price_xlarge'),
            'price_xxlarge' => $request->input('price_xxlarge'),
            'price_xxxlarge' => $request->input('price_xxxlarge'),
            'quantity_small' => $request->input('quantity_small'),
            'quantity_medium' => $request->input('quantity_medium'),
            'quantity_large' => $request->input('quantity_large'),
            'quantity_xlarge' => $request->input('quantity_xlarge'),
            'quantity_xxlarge' => $request->input('quantity_xxlarge'),
            'quantity_xxxlarge' => $request->input('quantity_xxxlarge'),
            'discount' => $request->input('discount'),
        ]);

        return redirect()->intended(route('dashboard.admin.product.index',  absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product, $id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.show', compact('user', 'product', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit', compact('user', 'product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $valid = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image[]' => 'mimes:jpg,png,jpeg,svg',
            'price' => 'required',
            'discount' => 'required',
            'quantity' => 'required',
            'size' => 'required',
        ]);

        $fileNames = [];
        if ($request->hasFile('image[]')) {
            foreach ($request->file('image') as $image) {
                $imageName = $image->hashName();
                $image->store('images/products', 'public');
                $fileNames[] = $imageName;
            }
    
            $images = $fileNames;
        } else {
            $images = $product->images;
        }

        $sizeArray = explode(',', $request->input('size'));

        $update = [
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'images' => $images,
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'quantity' => $request->input('quantity'),
            'size' => $sizeArray,
        ];

        $product->update($update);

        return redirect()->intended(route('dashboard.admin.product.index',  absolute: false));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('message', 'Message deleted Successfully');
    }
}
