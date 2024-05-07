@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="text-center">Products (Shopping Page)</h1>

        <h1>Categories</h1>
        @foreach ($products as $product)
            <p><a href=""> {{ $product->category->name }} </a></p>
        @endforeach
        <hr>


        <h1>Products</h1>
        @foreach ($products as $product)
            <p>Product Name: {{ $product->name }}</p>
            <p>Description: {{ $product->description }}</p>
            <p>Images:</p>
            @foreach ($product->images as $image)
                <img class="thumbnail m-5" width="10%" src="{{ asset('storage/images/products/' . $image) }}" alt="">
            @endforeach
            <p>Price</p>
            <li>Small: {{ $product->price_small }}</li>
            <li>Medium: {{ $product->price_medium }}</li>
            <li>Large: {{ $product->price_large }}</li>
            <li>xLarge: {{ $product->price_xlarge }}</li>
            <li>xxLarge: {{ $product->price_xxlarge }}</li>
            <li>xxxLarge: {{ $product->price_xxxlarge }}</li>
            <p>Quantity</p>
            <li>Small: {{ $product->quantity_small }} </li>
            <li>Medium: {{ $product->quantity_medium }} </li>
            <li>Large: {{ $product->quantity_large }} </li>
            <li>xLarge: {{ $product->quantity_xlarge }} </li>
            <li>xxLarge: {{ $product->quantity_xxlarge }} </li>
            <li>xxxLarge: {{ $product->quantity_xxxlarge }} </li>
            <p>Discount: {{ $product->discount }}</p>
            <p>Available Sizes:</p>
            @if ($product->quantity_small > 0)
                <li>Small</li>
            @endif
            @if ($product->quantity_medium > 0)
                <li>Medium</li>
            @endif
            @if ($product->quantity_large > 0)
                <li>Large</li>
            @endif
            @if ($product->quantity_xlarge > 0)
                <li>xLarge</li>
            @endif
            @if ($product->quantity_xxlarge > 0)
                <li>xxLarge</li>
            @endif
            @if ($product->quantity_xxxlarge > 0)
                <li>xxxLarge</li>
            @endif
            <p>Discount: {{ $product->discount }}</p>

            <a href="{{ route('dashboard.user.product.show', $product->id) }}"><button
                    class="btn btn-sm btn-outline-info m-1"><i class="bi bi-pencil-square"></i>More
                    Details</button></a>
            <form action="{{ route('dashboard.user.wishlist.store') }}" method="POST">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button class="btn btn-sm btn-outline-success m-1"><i class="bi bi-pencil-square"></i>Add to
                    Wishlist</button>
            </form>
            <form action="{{ route('dashboard.user.cart.store') }}" method="POST">
                @csrf
                @foreach ($carts as $cart)
                    <input type="hidden" value="{{ $cart->id }}" name="cart_id">
                @endforeach
                <input type="hidden" value="{{ $product->id }}" name="product_id">
                <input type="hidden" value="1" name="quantity">
                <input type="hidden" value="0" name="price_at_addition">
                <button class="btn btn-sm btn-outline-primary m-1"><i class="bi bi-pencil-square"></i>Add to
                    Cart</button>
            </form>
            {{-- <a href="{{ route('dashboard.user.product.show', $product->id) }}"><button
                    class="btn btn-sm btn-outline-primary m-1"><i class="bi bi-pencil-square"></i>Add to
                    Cart</button></a> --}}
            <hr>
        @endforeach
    </div>
@endsection
