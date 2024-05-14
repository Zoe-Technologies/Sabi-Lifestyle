<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\CartItem;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $products = Product::all();
        $categories = Category::all();
        $carts = Cart::all()->where('user_id', $user->id);
        foreach ($carts as $cart)
            $id = $cart->id;
        $cartitems = CartItem::all()->where('cart_id', $id);
        // dd(count($cartitems));
        return view('users.cartItems.index', compact('user', 'products', 'categories', 'cartitems', 'carts', 'id'));
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
        $cartitem = $request->validate([
            'cart_id' => ['required'],
            'product_id' => ['required', 'unique:cart_items'],
            'quantity' => ['required'],
            'price_at_addition' => ['required']
        ]);

        $cartitem = CartItem::create([
            'cart_id' => $request->input('cart_id'),
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
            'price_at_addition' => $request->input('price_at_addition'),
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CartItem $cartItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartitem = CartItem::findOrFail($id);
        $cartitem->delete();
        return redirect()->back();
    }
}
