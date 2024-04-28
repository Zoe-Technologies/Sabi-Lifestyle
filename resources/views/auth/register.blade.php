{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('layouts.homepage')

@section('content')
    <div class="container">
        <h1 class="text-center">Register Page</h1>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="InputName" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="InputName">
            </div>
            @if ($errors->has('name'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('name') }}</span>
            </span>
            @endif

            <div class="mb-3">
                <label for="InputSurname" class="form-label">Surname</label>
                <input type="text" name="surname" class="form-control" id="InputSurname">
            </div>
            @if ($errors->has('surname'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('surname') }}</span>
            </span>
            @endif

            <div class="mb-3">
                <label for="InputEmail" class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" id="InputEmail">
            </div>
            @if ($errors->has('email'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('email') }}</span>
            </span>
            @endif
            
            <div class="mb-3">
                <label for="InputPassword1" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="InputPassword1">
            </div>
            @if ($errors->has('password'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('password') }}</span>
            </span>
            @endif

            <div class="mb-3">
                <label for="InputConfirmPassword1" class="form-label">Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" id="InputConfirmPassword1">
            </div>
            @if ($errors->has('confirmpassword'))
            <span class="error">
                <span class="section-subtitle" style="margin-inline: 0px">{{ $errors->first('confirmpassword') }}</span>
            </span>
            @endif
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
        @endsection