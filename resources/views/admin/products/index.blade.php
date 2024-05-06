@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('dashboard.admin.product.create') }}"><button class="btn btn-outline-info btn-sm"><i
                        class="bi bi-plus"></i> Add Product</button></a>
        </div>
        <h1 class="text-center"><strong>All Products</strong></h1>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Images</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Available Size</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $product)
                    <tr style="background: none">
                        <td> {{ $product->category->name }} </td>
                        <td> {{ $product->name }} </td>
                        <td> {{ $product->description }} </td>
                        <td> <img src="{{ asset('storage/images/products/' . $product->images[0]) }}" width="30%"
                                class="img-fluid" alt=""> </td>
                        <td> 
                            <li>Small: {{ $product->price_small }}</li>
                            <li>Medium: {{ $product->price_medium }}</li>
                            <li>Large: {{ $product->price_large }}</li>
                            <li>xLarge: {{ $product->price_xlarge }}</li>
                            <li>xxLarge: {{ $product->price_xxlarge }}</li>
                            <li>xxxLarge: {{ $product->price_xxxlarge }}</li>
                        </td>
                        <td> 
                            <li>Small: {{ $product->quantity_small }} </li>
                            <li>Medium: {{ $product->quantity_medium }} </li>
                            <li>Large: {{ $product->quantity_large }} </li>
                            <li>xLarge: {{ $product->quantity_xlarge }} </li>
                            <li>xxLarge: {{ $product->quantity_xxlarge }} </li>
                            <li>xxxLarge: {{ $product->quantity_xxxlarge }} </li>
                        </td>
                        <td> {{ $product->discount }} </td>
                        <td>
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
                        </td>
                        {{-- <td> {{ $product->size[0] }} </td> --}}
                        <td>
                            <a href="{{ route('dashboard.admin.product.show', $product->id) }}"><button
                                    class="btn btn-sm btn-outline-success m-1"><i class="bi bi-pencil-square"></i>More
                                    Details</button></a>
                            <a href="{{ route('dashboard.admin.product.edit', $product->id) }}"><button
                                    class="btn btn-sm btn-outline-info m-1"><i
                                        class="bi bi-pencil-square"></i>Edit</button></a>
                            <a href="{{ route('dashboard.admin.product.destroy', $product->id) }}"><button
                                    class="btn btn-sm btn-outline-danger m-1"><i class="bi bi-trash"></i>Delete</button></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
