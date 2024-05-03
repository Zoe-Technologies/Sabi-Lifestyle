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
                    <th scope="col">Category Name</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Images</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Size</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($wishlists as $wishlist)
                    <tr style="background: none">
                        <td> {{ $wishlist->product->name }} </td>
                        {{-- <td> {{ $wishlist->name }} </td>
                        <td> {{ $wishlist->description }} </td>
                        <td> <img src="{{ asset('storage/images/products/' . $wishlist->images[0]) }}" width="30%"
                                class="img-fluid" alt=""> </td>
                        <td> {{ $wishlist->price }} </td>
                        <td> {{ $wishlist->discount }} </td>
                        <td> {{ $wishlist->quantity }} </td>
                        <td>
                            @foreach ($wishlist->size as $size)
                                {{ $size }},
                            @endforeach
                        </td> --}}
                        {{-- <td> {{ $wishlist->size[0] }} </td> --}}
                        <td>
                            <a href="{{ route('dashboard.admin.product.show', $wishlist->id) }}"><button
                                    class="btn btn-sm btn-outline-success m-1"><i class="bi bi-pencil-square"></i>More
                                    Details</button></a>
                            <a href="{{ route('dashboard.admin.product.edit', $wishlist->id) }}"><button
                                    class="btn btn-sm btn-outline-info m-1"><i
                                        class="bi bi-pencil-square"></i>Edit</button></a>
                            <a href="{{ route('dashboard.admin.product.destroy', $wishlist->id) }}"><button
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
