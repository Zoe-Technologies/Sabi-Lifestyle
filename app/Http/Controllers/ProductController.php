<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Builder\Property;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $product = Product::all();
        return view('admin.products.index', compact('product', 'user'));
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
        $product= $request->validate([
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
        foreach ($request->file('image') as $image) {
            $imageName = $image->hashName();
            $image->store('images/products', 'public');
            $fileNames[] = $imageName;
        }

        $images = $fileNames;

        $sizeArray = explode(',', $request->input('size'));

        // dd($sizeArray);

        $product= Product::create([
            'category_id' => $request->input('category_id'),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'images' => $images,
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'quantity' => $request->input('quantity'),
            'size' => $sizeArray,
        ]);

        return redirect()->intended(route('dashboard.admin.product.index',  absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product, $id)
    {
        $user = auth()->user();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('user', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        $category = Product::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'Message deleted Successfully');
    }
}
