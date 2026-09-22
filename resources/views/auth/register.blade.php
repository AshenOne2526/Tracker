@extends('layouts.app')

@section('title', 'Sign up')

@php
    $divClass = 'flex items-center text-center text-s gap-2';
@endphp

@section('content')
    <x-auth-card>
        <div>
            <x-auth-header>Welcome to Tracker</x-auth-header>
            <p class="mt-1 text-s text-gray2-dark text-center">Create an account to start tracking your work.</p>
        </div>

        <div class="flex flex-col gap-4">
            <x-button-google/>

            <x-devider>or</x-devider>

            <form class="flex flex-col gap-4" method="post" action="{{ route('register.store') }}">
                @csrf
                <div>
                    <x-label for="name">Full name</x-label>

                    <x-input
                        id="name"
                        name="name"
                        type="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        inputmode="name"
                        placeholder="Enter your full name"
                        required
                        autofocus
                    />

                    @error('email')
                        <p class="mt-1 text-s text-error" role="alert">{{  $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-label for="email">Email</x-label>

                    <x-input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        inputmode="email"
                        placeholder="Enter your email address"
                        required
                    />

                    @error('email')
                        <p class="mt-1 text-s text-error" role="alert">{{  $message }}</p>
                    @enderror
                </div>

                <div>
                    <x-label for="password">Password</x-label>
                    
                    <div data-password-strength>
                        <x-input-password
                            id="password"
                            name="password"
                            autocomplete="new-password"
                            placeholder="Enter your password"
                            required
                        />

                        <x-password-strength />

                        @error('password')
                            <p class="mt-1 text-s text-error" role="alert">{{  $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <x-checkbox name="terms" class="mt-4" required>
                        I have read and agree to the
                        <a href="#" target="_blank" rel="noreferrer">Terms of Service</a>
                        and
                        <a href="#" target="_blank" rel="noreferrer">Privacy Policy</a>
                    </x-checkbox>

                    @error('terms')
                        <p class="mt-1 text-s text-error" role="alert">{{  $message }}</p>
                    @enderror
                </div>

                <x-button class="font-semibold shrink-0" textSize="m">Create an account</x-button>
            </form>

            <div class="{{ $divClass }} justify-center">
                <p class="text-gray2-dark">Already have an account?</p>
                <a href="{{ route('login') }}" class="font-medium text-blue-contrast no-underline transition-colors duration-fast ease-smooth hover:text-primary-hover">Sign in</a>
            </div>
        </div>
    </x-auth-card>
@endsection
