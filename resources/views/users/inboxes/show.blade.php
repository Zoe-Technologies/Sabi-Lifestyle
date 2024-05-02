@extends('layouts.dashboard')

@section('content')
    <div class="container my-5">
        <p>TIme Sent: {{ $inbox->created_at }}</p>
        <p>Message: {{ $inbox->message }}</p>
    </div>
@endsection
