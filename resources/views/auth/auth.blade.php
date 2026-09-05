@extends('layouts.app')

@section('title', 'Sign in')

@php
    $divClass = 'flex items-center text-center text-s gap-2';
@endphp

@section('content')
    <div class="flex flex-col gap-6 mx-auto w-full max-w-[400px] pt-11 px-10 pb-5 rounded-form border border-overlay-6 bg-background-main shadow-card">
        <h1 class="font-sans text-2xl font-semibold text-headline">Sign in to Tracker</h1>

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

                <div class="relative">
                    <x-input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        placeholder="Enter your password"
                        required
                    />
                    <button
                        type="button"
                        class="absolute top-1/2 right-2 flex size-8 -translate-y-1/2 cursor-pointer items-center justify-center rounded-action border-0 bg-transparent text-gray2-dark transition-colors duration-fast ease-smooth hover:text-gray3-dark focus-visible:outline-none"
                        data-password-toggle
                        aria-label="Show password"
                        aria-controls="password"
                        aria-pressed="false"
                    >
                        <svg data-password-icon="show" class="size-icon fill-current" aria-hidden="true"><use href="#icon-eye"></use></svg>
                        <svg data-password-icon="hide" class="hidden size-icon fill-current" aria-hidden="true"><use href="#icon-eye-slash"></use></svg>
                    </button>
                </div>
            </div>

            <div class="flex flex-col gap-4 mt-4">
                <x-button class="font-semibold shrink-0" textSize="m">Sign in</x-button>

                <div class="flex gap-6 items-center px-6">
                    <div class="flex-1 border-b border-solid border-gray4-light"></div>
                    <div class="text-s text-gray2-dark">or</div>
                    <div class="flex-1 border-b border-solid border-gray4-light"></div>
                </div>

                <x-button type="secondary" buttonType="button">
                    <svg class="size-4 shrink-0" fill="none" aria-hidden="true"><use href="#icon-google"></use></svg>
                    Continue with Google
                </x-button>
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
    </div>
@endsection
