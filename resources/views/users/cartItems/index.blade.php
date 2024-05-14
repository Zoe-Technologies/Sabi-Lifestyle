@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Your cartitem</h1>

        <hr>

        @if (count($cartitems) <= 0)
            <h1>Your Cart is empty</h1>
        @else
            <form action="{{ route('dashboard.user.order.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1>Products</h1>
                @foreach ($cartitems as $cartitem)
                    <p>Product Name: {{ $cartitem->product->name }}</p>
                    <p>Description: {{ $cartitem->product->description }}</p>
                    <p>Images:</p>
                    @foreach ($cartitem->product->images as $image)
                        <img class="thumbnail m-5" width="10%" src="{{ asset('storage/images/products/' . $image) }}"
                            alt="">
                    @endforeach


                    <p>Select Quantity</p>
                    @if ($cartitem->product->quantity_small > 0)
                        <label class="form-label">Small (Quantiy Remaining: {{ $cartitem->product->quantity_small }}, Price:
                            {{ $cartitem->product->price_small }})</label>
                        <input type="number" class="form-control" name="quantity_small" id="quantity_small" min="0">
                        @if ($errors->has('quantity_small'))
                            <span class="error">
                                <span class="section-subtitle"
                                    style="margin-inline: 0px">{{ $errors->first('quantity_small') }}</span>
                            </span>
                        @endif
                    @endif
                    @if ($cartitem->product->quantity_medium > 0)
                        <label class="form-label">Medium (Quantiy Remaining:
                            {{ $cartitem->product->quantity_medium }}, Price:
                            {{ $cartitem->product->price_medium }})</label>
                        <input type="number" class="form-control" name="quantity_medium" id="quantity_medium"
                            min="0">
                        @if ($errors->has('quantity_medium'))
                            <span class="error">
                                <span class="section-subtitle"
                                    style="margin-inline: 0px">{{ $errors->first('quantity_medium') }}</span>
                            </span>
                        @endif
                    @endif
                    @if ($cartitem->product->quantity_large > 0)
                        <label class="form-label">Large (Quantiy Remaining:
                            {{ $cartitem->product->quantity_large }}, Price:
                            {{ $cartitem->product->price_large }})</label>
                        <input type="number" class="form-control" name="quantity_large" id="quantity_large" min="0">
                        @if ($errors->has('quantity_large'))
                            <span class="error">
                                <span class="section-subtitle"
                                    style="margin-inline: 0px">{{ $errors->first('quantity_large') }}</span>
                            </span>
                        @endif
                    @endif
                    @if ($cartitem->product->quantity_xlarge > 0)
                        <label class="form-label">xLarge (Quantiy Remaining:
                            {{ $cartitem->product->quantity_xlarge }}, Price:
                            {{ $cartitem->product->price_xlarge }})</label>
                        <input type="number" class="form-control" name="quantity_xlarge" id="quantity_xlarge"
                            min="0">
                        @if ($errors->has('quantity_xlarge'))
                            <span class="error">
                                <span class="section-subtitle"
                                    style="margin-inline: 0px">{{ $errors->first('quantity_xlarge') }}</span>
                            </span>
                        @endif
                    @endif
                    @if ($cartitem->product->quantity_xxlarge > 0)
                        <label class="form-label">xxLarge (Quantiy Remaining:
                            {{ $cartitem->product->quantity_xxlarge }}, Price:
                            {{ $cartitem->product->price_xxlarge }})</label>
                        <input type="number" class="form-control" name="quantity_xxlarge" id="quantity_xxlarge"
                            min="0">
                        @if ($errors->has('quantity_xxlarge'))
                            <span class="error">
                                <span class="section-subtitle"
                                    style="margin-inline: 0px">{{ $errors->first('quantity_xxlarge') }}</span>
                            </span>
                        @endif
                    @endif
                    @if ($cartitem->product->quantity_xxxlarge > 0)
                        <label class="form-label">xxxLarge (Quantiy Remaining:
                            {{ $cartitem->product->quantity_xxxlarge }}, Price:
                            {{ $cartitem->product->price_xxxlarge }})</label>
                        <input type="number" class="form-control" name="quantity_xxxlarge" id="quantity_xxxlarge"
                            min="0">
                        @if ($errors->has('quantity_xxxlarge'))
                            <span class="error">
                                <span class="section-subtitle"
                                    style="margin-inline: 0px">{{ $errors->first('quantity_xxxlarge') }}</span>
                            </span>
                        @endif
                    @endif
                    <p>Discount: {{ $cartitem->product->discount }}</p>

                    <div class="mb-3">
                        <label class="form-label" for="total_amount">Total Price:</label>
                        <input class="form-control" value="400000" type="text" id="total_amount" name="total_amount"
                            readonly>
                    </div>
                    @if ($errors->has('total_amount'))
                        <span class="error">
                            <span class="section-subtitle"
                                style="margin-inline: 0px">{{ $errors->first('total_amount') }}</span>
                        </span>
                    @endif

                    {{-- <form action="{{ route('dashboard.user.wishlist.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <input type="hidden" name="product_id" value="{{ $cartitem->id }}">
                        <button class="btn btn-sm btn-outline-success m-1"><i class="bi bi-pencil-square"></i>Add to
                            Wishlist</button>
                    </form> --}}
                    <a href="{{ route('dashboard.user.cart.destroy', $cartitem->id) }}"><button
                            class="btn btn-sm btn-outline-danger m-1"><i class="bi bi-pencil-square"></i>Remove
                            Product</button></a>
                    {{-- <a href="{{ route('dashboard.user.product.show', $cartitem->product->id) }}"><button
                        class="btn btn-sm btn-outline-primary m-1"><i class="bi bi-pencil-square"></i>Add to
                        cartitem</button></a> --}}
                    <hr>
                @endforeach

                <input type="hidden" name="user_id" id="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="order_number" id="order_number">
                @if ($errors->has('order_number'))
                    <span class="error">
                        <span class="section-subtitle"
                            style="margin-inline: 0px">{{ $errors->first('order_number') }}</span>
                    </span>
                @endif

                <input type="hidden" name="status" id="status" value="Pending">
                @if ($errors->has('status'))
                    <span class="error">
                        <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('status') }}</span>
                    </span>
                @endif

                <input type="hidden" name="payment_method" id="payment_method" value="Pending">
                @if ($errors->has('payment_method'))
                    <span class="error">
                        <span class="section-subtitle"
                            style="margin-inline: 0px">{{ $errors->first('payment_method') }}</span>
                    </span>
                @endif

                <input type="hidden" name="payment_status" id="payment_status" value="Pending">
                @if ($errors->has('payment_status'))
                    <span class="error">
                        <span class="section-subtitle"
                            style="margin-inline: 0px">{{ $errors->first('payment_status') }}</span>
                    </span>
                @endif

                <input type="hidden" name="shipping_address" id="shipping_address" value="Pending">
                @if ($errors->has('shipping_address'))
                    <span class="error">
                        <span class="section-subtitle"
                            style="margin-inline: 0px">{{ $errors->first('shipping_address') }}</span>
                    </span>
                @endif

                <button class="btn btn-sm btn-outline-info mt-3" type="submit">Place Order</button>
            </form>
        @endif


    </div>
@endsection
