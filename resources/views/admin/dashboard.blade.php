@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1 class="text-center">Admin Dashboard</h1>
        <ol>
            <strong>Features</strong>
            <li>Add Categories</li> <a href="{{ route('dashboard.admin.category.index') }}">Category</a>
            <li>Add Products</li>  <a href="{{ route('dashboard.admin.product.index') }}">Product</a>  <a href="{{ route('dashboard.admin.product.create') }}">Add Product</a>
            <li>View Orders</li>
            <li>View Product Ordered</li>
            <li>Receive Messages</li> <a href="{{ route('dashboard.admin.inbox.index') }}">Inbox</a>
        </ol><br><br>

    </div>
@endsection