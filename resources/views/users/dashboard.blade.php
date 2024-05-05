@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="text-center">User Dashboard</h1>
        <ul>
            <li><a class="text-decoration-none" href="{{ route('dashboard.user.product.index') }}">See Products</a></li>
            <li><a class="text-decoration-none" href="{{ route('dashboard.user.wishlist.index') }}">Wishlist</a></li>
            <li><a class="text-decoration-none" href="{{ route('dashboard.user.cart.index') }}">See Cart</a></li>
            <li><a class="text-decoration-none" href="#">See Order</a></li>
            <li><a class="text-decoration-none" href="#">Edit Profile</a></li>
            <li><a class="text-decoration-none" href="#">Messages</a></li>
        </ul>
    </div>
@endsection