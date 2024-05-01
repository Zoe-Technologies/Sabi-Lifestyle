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
        <p>Price: {{ $product->price }}</p>
        <p>Discount: {{ $product->discount }}</p>
        <p>Quantity Remaining: {{ $product->quantity }}</p>
        <p>Available Sizes:
            @foreach ($product->size as $size)
                {{ $size }}
            @endforeach
        </p>
    </div>
@endsection
