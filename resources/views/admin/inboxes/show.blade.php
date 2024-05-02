@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <p>TIme Sent: {{ $inbox->created_at }}</p>
        <p>Message: {{ $inbox->message }}</p>
        <p>Email Address: {{ $inbox->user->email }}</p>
    </div>
@endsection
