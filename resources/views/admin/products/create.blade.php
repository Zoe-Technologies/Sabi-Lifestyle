@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Add Products</h1>

        <form method="POST" action="{{ route('dashboard.admin.product.store') }}" enctype="multipart/form-data" id="myForm">
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

            <fieldset class="border border-black p-3 mb-3">
                <legend>Prices</legend>
                <div class="row">
                    <div class="mb-3 col-md-2">
                        <label for="price_small" class="form-label">Price (Small):</label>
                        <input type="number" name="price_small" class="form-control" min="0" id="price_small" value={{ old('price_small') }}>
                    </div>
                    @if ($errors->has('price_small'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('price_small') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="price_medium" class="form-label">Price (Medium):</label>
                        <input type="number" name="price_medium" class="form-control" min="0" id="price_medium" value={{ old('price_medium') }}>
                    </div>
                    @if ($errors->has('price_medium'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('price_medium') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="price_large" class="form-label">Price (Large):</label>
                        <input type="number" name="price_large" class="form-control" min="0" id="price_large" value={{ old('price_large') }}>
                    </div>
                    @if ($errors->has('price_large'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('price_large') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="price_xlarge" class="form-label">Price (xLarge):</label>
                        <input type="number" name="price_xlarge" class="form-control" min="0" id="price_xlarge" value={{ old('price_xlarge') }}>
                    </div>
                    @if ($errors->has('price_xlarge'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('price_xlarge') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="price_xxlarge" class="form-label">Price (xxLarge):</label>
                        <input type="number" name="price_xxlarge" class="form-control" min="0" id="price_xxlarge" value={{ old('price_xxlarge') }}>
                    </div>
                    @if ($errors->has('price_xxlarge'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('price_xxlarge') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="price_xxxlarge" class="form-label">Price (xxxLarge):</label>
                        <input type="number" name="price_xxxlarge" class="form-control" min="0" id="price_xxxlarge" value={{ old('price_xxxlarge') }}>
                    </div>
                    @if ($errors->has('price_xxxlarge'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('price_xxxlarge') }}</span>
                        </span>
                    @endif
                </div>
            </fieldset>

            <fieldset class="border border-black p-3 mb-3">
                <legend>Quantity Available</legend>
                <div class="row">
                    <div class="mb-3 col-md-2">
                        <label for="quantity_small" class="form-label">Quantity (Small):</label>
                        <input type="number" name="quantity_small" class="form-control" min="0" id="quantity_small" value={{ old('quantity_small') }}>
                    </div>
                    @if ($errors->has('quantity_small'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('quantity_small') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="quantity_medium" class="form-label">Quantity (Medium):</label>
                        <input type="number" name="quantity_medium" class="form-control" min="0" id="quantity_medium" value={{ old('quantity_medium') }}>
                    </div>
                    @if ($errors->has('quantity_medium'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('quantity_medium') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="quantity_large" class="form-label">Quantity (Large):</label>
                        <input type="number" name="quantity_large" class="form-control" min="0" id="quantity_large" value={{ old('quantity_large') }}>
                    </div>
                    @if ($errors->has('quantity_large'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('quantity_large') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="quantity_xlarge" class="form-label">Quantity (xLarge):</label>
                        <input type="number" name="quantity_xlarge" class="form-control" min="0" id="quantity_xlarge" value={{ old('quantity_xlarge') }}>
                    </div>
                    @if ($errors->has('quantity_xlarge'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('quantity_xlarge') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="quantity_xxlarge" class="form-label">Quantity (xxLarge):</label>
                        <input type="number" name="quantity_xxlarge" class="form-control" min="0" id="quantity_xxlarge" value={{ old('quantity_xxlarge') }}>
                    </div>
                    @if ($errors->has('quantity_xxlarge'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('quantity_xxlarge') }}</span>
                        </span>
                    @endif
                    <div class="mb-3 col-md-2">
                        <label for="quantity_xxxlarge" class="form-label">Quantity (xxxLarge):</label>
                        <input type="number" name="quantity_xxxlarge" class="form-control" min="0" id="quantity_xxxlarge" value={{ old('quantity_xxxlarge') }}>
                    </div>
                    @if ($errors->has('quantity_xxxlarge'))
                        <span class="error">
                            <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('quantity_xxxlarge') }}</span>
                        </span>
                    @endif
                </div>
            </fieldset>

            <div class="mb-3">
                <label for="discount" class="form-label">Discount:</label>
                <input type="number" name="discount" class="form-control" id="discount" min="0" value={{ old('discount') }}>
            </div>
            @if ($errors->has('discount'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('discount') }}</span>
                </span>
            @endif



            <button class="btn btn-sm btn-outline-info mt-3" type="submit">Submit</button>

        </form>
    </div>
@endsection
