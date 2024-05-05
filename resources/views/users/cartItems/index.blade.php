@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">YOUR CART</h1>

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
                @foreach ($cartitems as $cartitem)
                    <tr style="background: none">
                        <td> {{ $cartitem->product->category->name }} </td>
                        <td> {{ $cartitem->product->name }} </td>
                        <td> {{ $cartitem->product->description }} </td>
                        <td> <img src="{{ asset('storage/images/products/' . $cartitem->product->images[0]) }}" width="30%"
                                class="img-fluid" alt=""> </td>
                        <td> {{ $cartitem->product->price }} </td>
                        <td> {{ $cartitem->product->discount }} </td>
                        <td> {{ $cartitem->product->quantity }} </td>
                        <td>
                            @foreach ($cartitem->product->size as $size)
                                {{ $size }},
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('dashboard.user.product.show', $cartitem->id) }}"><button
                                    class="btn btn-sm btn-outline-success m-1"><i class="bi bi-pencil-square"></i>More
                                    Details</button></a>
                            <a href="{{ route('dashboard.user.cart.destroy', $cartitem->id) }}"><button
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