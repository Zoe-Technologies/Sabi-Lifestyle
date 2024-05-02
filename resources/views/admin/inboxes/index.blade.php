@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <h1 class="text-center">Messages(Inbox)</h1>
        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Time Sent</th>
                    <th scope="col">Email Address</th>
                    <th scope="col">Message</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($inboxes as $inbox)
                    <tr style="background: none">
                        <td> {{ $inbox->created_at }} </td>
                        <td> {{ $inbox->user->email }} </td>
                        <td> {{ $inbox->message }} </td>
                        <td>
                            <a href="{{ route('dashboard.admin.inbox.show', $inbox->id) }}"><button
                                    class="btn btn-sm btn-outline-info m-1"><i class="bi bi-pencil-square"></i>Show</button></a>
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