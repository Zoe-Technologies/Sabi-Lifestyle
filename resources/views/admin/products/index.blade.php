@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('dashboard.admin.category.create') }}"><button class="btn btn-outline-info btn-sm"><i
                        class="bi bi-plus"></i> Add Category</button></a>
        </div>
        <h1 class="text-center"><strong>All Categories</strong></h1>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Category Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $category)
                    <tr style="background: none">
                        <td> {{ $category->name }} </td>
                        <td> <img src="{{ asset('storage/' . $category->image) }}" width="30%" class="img-fluid" alt=""> </td>
                        <td>
                            <a href="{{ route('dashboard.admin.category.edit', $category->id) }}"><button
                                    class="btn btn-sm btn-outline-info"><i class="bi bi-pencil-square"></i>Edit</button></a>
                            <a href="{{ route('dashboard.admin.category.destroy', $category->id) }}"><button
                                    class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i>Delete</button></a>
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
