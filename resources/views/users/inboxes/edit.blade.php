@extends('layouts.dashboard')

@section('content')
    <h1 class="text-center mt-5"><strong>Send Message</strong></h1>
    <div class="container">
        <form method="POST" action="{{ route('dashboard.user.inbox.update', $inbox->id) }}"
            enctype="multipart/form-data">
            @csrf
            <input type="text" name="user_id" id="" hidden value="{{ $user->id }}">
            <label for="message" class="form-label">Message: </label>
            <textarea class="form-control" name="message" id="message" rows="3" value={{ old('message') }}></textarea>
            @if ($errors->has('message'))
                <span class="error">
                    <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('message') }}</span>
                </span>
            @endif

            <button class="btn btn-sm btn-outline-info mt-3" type="submit">Submit</button>
        </form>
    </div>
@endsection
