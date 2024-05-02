@extends('layouts.dashboard')

@section('content')
    <div class="container mt-5">
        <div>
            <a href="{{ route('dashboard.user.inbox.create') }}"><button class="btn btn-outline-info btn-sm"><i
                        class="bi bi-plus"></i> Send Message</button></a>
        </div>
        <h1 class="text-center"><strong>All Message</strong></h1>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Time Sent</th>
                    <th scope="col">Message</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($inboxes as $inbox)
                    <tr style="background: none">
                        <td> {{ $inbox->created_at }} </td>
                        <td> {{ $inbox->message }} </td>
                        <td>
                            <a href="{{ route('dashboard.user.inbox.edit', $inbox->id) }}"><button
                                    class="btn btn-sm btn-outline-info m-1"><i class="bi bi-pencil-square"></i>Edit</button></a>
                            <a href="{{ route('dashboard.user.inbox.destroy', $inbox->id) }}"><button
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
