<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        DB::beginTransaction();

        try {
            

            $order = $request->validate([
                'user_id' => ['required'],
                'order_number' => ['unique:orders'],
                'status' => ['required'],
                'total_amount' => ['required'],
                'shipping_address' => ['required'],
                'payment_method' => ['required'],
                'payment_status' => ['required'],
            ]);

            function generateRandomString($length = 30)
            {
                // Characters to be included in the random string
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                // Generate random string
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }

            // Generate a random string of length 30
            $order_number = generateRandomString();
            // Create a new order
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'order_number' => $order_number,
                'status' => $request->input('status'),
                'total_amount' => $request->input('total_amount'),
                'shipping_address' => auth()->user()->address,
                'payment_method' => $request->input('payment_method'),
                'payment_status' => $request->input('payment_status'),
            ]);

            // dd($order);
            // Initialize an array to store order items
            // $orderItems = [];

            // Get the user's cart items
            $carts = Cart::all()->where('user_id', auth()->user()->id);
            foreach ($carts as $cart)
                $id = $cart->id;
            $cartItems = CartItem::all()->where('cart_id', $id);

            // Loop through the cart items and create order items
            $orderItem = $request->validate([
                'price_small' => ['nullable'],
                'price_medium' => ['nullable'],
                'price_large' => ['nullable'],
                'price_xlarge' => ['nullable'],
                'price_xxlarge' => ['nullable'],
                'price_xxxlarge' => ['nullable'],
                'quantity_small' => ['nullable'],
                'quantity_medium' => ['nullable'],
                'quantity_large' => ['nullable'],
                'quantity_xlarge' => ['nullable'],
                'quantity_xxlarge' => ['nullable'],
                'quantity_xxxlarge' => ['nullable'],
            ]);

            foreach ($cartItems as $cartItem) {
                
                $orderItem = OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product->id,
                    'quantity_small' => $request->input('quantity_small'),
                    'quantity_medium' => $request->input('quantity_medium'),
                    'quantity_large' => $request->input('quantity_large'),
                    'quantity_xlarge' => $request->input('quantity_xlarge'),
                    'quantity_xxlarge' => $request->input('quantity_xxlarge'),
                    'quantity_xxxlarge' => $request->input('quantity_xxxlarge'),
                    'price_small' => $cartItem->product->price_small,
                    'price_medium' => $cartItem->product->price_medium,
                    'price_large' => $cartItem->product->price_large,
                    'price_xlarge' => $cartItem->product->price_xlarge,
                    'price_xxlarge' => $cartItem->product->price_xxlarge,
                    'price_xxxlarge' => $cartItem->product->price_xxxlarge,
                ]);
            }
            // dd($orderItem);

            // $cartItems->delete();
            
            // Commit the transaction
            DB::commit();

            return redirect()->route('dashboard.user.dashboard.user')->with('success', 'Order placed successfully');
        } catch (\Exception $e) {
            // Rollback the transaction if an exception occurs
            DB::rollback();

            return back()->with('error', 'Failed to place order. Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     */

    // public function store(Request $request)
    // {
    //     $order = $request->validate([
    //         'user_id' => ['required'],
    //         'order_number' => ['unique:orders'],
    //         'status' => ['required'],
    //         'quantity_small' => ['nullable'],
    //         'quantity_medium' => ['nullable'],
    //         'quantity_large' => ['nullable'],
    //         'quantity_xlarge' => ['nullable'],
    //         'quantity_xxlarge' => ['nullable'],
    //         'quantity_xxxlarge' => ['nullable'],
    //         'total_amount' => ['required'],
    //         'payment_method' => ['required'],
    //         'payment_status' => ['required'],
    //     ]);

    //     function generateRandomString($length = 30)
    //     {
    //         // Characters to be included in the random string
    //         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    //         $charactersLength = strlen($characters);
    //         $randomString = '';
    //         // Generate random string
    //         for ($i = 0; $i < $length; $i++) {
    //             $randomString .= $characters[rand(0, $charactersLength - 1)];
    //         }
    //         return $randomString;
    //     }
    //     $order_number = generateRandomString();

    //     dd($order_number);
    //     // // Get the user's cart items
    //     // $carts = Cart::all()->where('user_id', auth()->user()->id);
    //     // foreach ($carts as $cart)
    //     //     $id = $cart->id;
    //     // $cartItems = CartItem::all()->where('cart_id', $id);
    //     $order = Order::create([
    //         'user_id' => auth()->user()->id,
    //         'order_number' => $order_number,
    //         'status' => $request->input('status'),
    //         'total_amount' => $request->input('total_amount'),
    //         'address' => auth()->user()->address,
    //         'payment_method' => 2,
    //         'payment_status' => 3,
    //     ]);

    //     return redirect()->intended(route('dashboard.admin.product.index',  absolute: false));
    // }

    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
