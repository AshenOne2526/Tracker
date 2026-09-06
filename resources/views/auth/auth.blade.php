@extends('layouts.app')

@section('title', 'Sign in')

@php
    $divClass = 'flex items-center text-center text-s gap-2';
@endphp

@section('content')
    <x-auth-card>
        <x-auth-header>Sign in to Tracker</x-auth-header>

        <form class="flex flex-col gap-4" method="post" action="#" onsubmit="event.preventDefault()">
            <div>
                <x-label for="email">Email</x-label>

                <x-input
                    id="email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    inputmode="email"
                    placeholder="Enter your email address"
                    required
                    autofocus
                />
            </div>

            <div>
                <x-label for="password">Password</x-label>
                <x-input-password
                    id="password"
                    name="password"
                    autocomplete="current-password"
                    placeholder="Enter your password"
                    required
                />
            </div>

            <div class="flex flex-col gap-4 mt-4">
                <x-button class="font-semibold shrink-0" textSize="m">Sign in</x-button>

                <x-devider>or</x-devider>

                <x-button-google/>
            </div>
        </form>

        <div class="flex flex-col gap-2">
            <div class="{{ $divClass }}">
                <p class="text-gray2-dark">By continuing, acknowledge that you agree to our 
                     <a href="#" target="_blank" rel="noreferrer">Terms of Conditions</a>
                     and
                    <a href="#" target="_blank" rel="noreferrer">Privacy Policy</a>
                </p>
            </div>
            <div class="{{ $divClass }} justify-center">
                <p class="text-gray2-dark">Don't have an account?</p>
                <a href="{{ route('register') }}" class="font-medium text-blue-contrast no-underline transition-colors duration-fast ease-smooth hover:text-primary-hover">Sign up</a>
            </div>
        </div>
    </x-auth-card>
@endsection
