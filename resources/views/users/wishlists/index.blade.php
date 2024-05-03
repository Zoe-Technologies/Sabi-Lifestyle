@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('dashboard.admin.category.create') }}"><button class="btn btn-outline-info btn-sm"><i
                        class="bi bi-plus"></i> Add Category</button></a>
        </div>
        <h1 class="text-center"><strong>Wishlists</strong></h1>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Product Category</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Images</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Available Size</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($wishlists as $wishlist)
                    <tr style="background: none">
                        <td> {{ $wishlist->product->category->name }} </td>
                        <td> {{ $wishlist->product->name }} </td>
                        <td> {{ $wishlist->product->description }} </td>
                        <td> <img src="{{ asset('storage/images/products/' . $wishlist->product->images[0]) }}" width="30%"
                                class="img-fluid" alt=""> </td>
                        <td> {{ $wishlist->product->price }} </td>
                        <td> {{ $wishlist->product->discount }} </td>
                        <td> {{ $wishlist->product->quantity }} </td>
                        <td>
                            @foreach ($wishlist->product->size as $size)
                                {{ $size }},
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('dashboard.user.product.show', $wishlist->id) }}"><button
                                    class="btn btn-sm btn-outline-success m-1"><i class="bi bi-pencil-square"></i>More
                                    Details</button></a>
                            <a href="{{ route('dashboard.user.wishlist.destroy', $wishlist->id) }}"><button
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
