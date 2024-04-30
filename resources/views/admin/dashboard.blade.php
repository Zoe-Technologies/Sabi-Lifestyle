@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="text-center">Admin Dashboard</h1>
        <ol>
            <strong>Features</strong>
            <li>Add Categories</li> <a href="{{ route('dashboard.admin.category.category.index') }}">Category</a>
            <li>Add Products</li>
            <li>View Orders</li>
            <li>View Product Ordered</li>
            <li>Receive Messages</li>
        </ol><br><br>

    </div>
@endsection