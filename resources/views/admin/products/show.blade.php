@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <p>Category Name: {{ $product->category->name }}</p>
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
    </div>
@endsection
