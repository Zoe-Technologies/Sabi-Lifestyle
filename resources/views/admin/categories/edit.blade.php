@extends('layouts.dashboard')

@section('content')
    <h1 class="text-center mt-5"><strong>Edit Category</strong></h1>
    <div class="container">
        <form method="POST" action="{{ route('dashboard.admin.category.update', $category->id) }}"
            enctype="multipart/form-data">
            @csrf
            <label for="name" class="form-label">Category Name: </label>
            <input type="text" name="name" id="name" class="form-control" placeholder="{{ $category->name }}"
                required>
            @if ($errors->has('name'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('name') }}</span>
                </span>
            @endif

            <label for="image" class="form-label">Image: </label>
            <input type="file" name="image" id="image" value="Pending" class="form-control">
            @if ($errors->has('image'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('image') }}</span>
                </span>
            @endif

            <button class="btn btn-sm btn-outline-info mt-3" type="submit">Submit</button>
        </form>
    </div>
@endsection
