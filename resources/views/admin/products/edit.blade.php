@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Edit Products</h1>

        <form method="POST" action="{{ route('dashboard.admin.product.update', $product->id) }}" enctype="multipart/form-data" id="myForm">
            @csrf
            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select class="form-select" name="category_id" id="category" value={{ old('category') }}>
                    <option>Select Your Category</option>
                    @foreach ($categories as $category)
                        <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @if ($errors->has('category'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('category') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" name="name" class="form-control" id="name" value={{ old('name') }}>
            </div>
            @if ($errors->has('name'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('name') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="description" class="form-label">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="3" value={{ old('description') }}></textarea>
            </div>
            @if ($errors->has('description'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('description') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="image[]" class="form-label">Image:</label>
                <input type="file" name="image[]" class="form-control" id="image[]" multiple>
            </div>
            @if ($errors->has('image[]'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('image[]') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label class="form-label" for="size">Available Size (separate by commas):</label>
                <input class="form-control" type="text" id="size" name="size">
            </div>
            @if ($errors->has('size[]'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('size[]') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" name="price" class="form-control" id="price" value={{ old('price') }}>
            </div>
            @if ($errors->has('price'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('price') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="discount" class="form-label">Discount:</label>
                <input type="number" name="discount" class="form-control" id="discount" value={{ old('discount') }}>
            </div>
            @if ($errors->has('discount'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('discount') }}</span>
                </span>
            @endif

            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:</label>
                <input type="number" min="0" name="quantity" class="form-control" id="quantity"
                    value={{ old('quantity') }}>
            </div>
            @if ($errors->has('quantity'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('quantity') }}</span>
                </span>
            @endif


            <button class="btn btn-sm btn-outline-info mt-3" type="submit">Submit</button>

        </form>
    </div>
@endsection
