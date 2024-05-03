<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $products = Product::all();
        $categories = Category::all();
        $wishlists = Wishlist::all()->where('user_id', $user->id);
        return view('users.wishlists.index', compact('user', 'products', 'categories', 'wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $wishlist = $request->validate([
            'user_id' => ['required'],
            'product_id' => ['required']
        ]);

        $wishlist = Wishlist::create([
            'user_id' => $request->input('user_id'),
            'product_id' => $request->input('product_id'),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist, $id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect()->back();
    }
}
