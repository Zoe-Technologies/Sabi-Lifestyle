@extends('layouts.dashboard')

@section('content')
<div class="mt-5 container">
    <h1 class="text-center">Create Categories</h1>
    <form action="{{ route('dashboard.admin.category.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>
        @if ($errors->has('category'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('category') }}</span>
            </span>
        @endif
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>
        @if ($errors->has('image'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('image') }}</span>
            </span>
        @endif
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection