@extends('layouts.app')

@section('title', 'Sign in')

@php
    $labelClass = 'mb-1.5 block text-s font-medium text-gray6-dark';
    $inputClass = 'h-10 w-full rounded-input border border-border bg-background-main px-3 text-s text-body outline-none transition-[border-color] duration-fast ease-smooth placeholder:text-gray2-dark focus:border-primary';
@endphp

@section('content')
    <div class="mx-auto w-full max-w-[400px] rounded-form border border-overlay-6 bg-background-main p-8 shadow-card">
        <h1 class="mb-6 font-sans text-2xl font-semibold text-headline">Sign in to Tracker</h1>

        <form class="flex flex-col gap-4" method="post" action="#" onsubmit="event.preventDefault()">
            <div>
                <label class="{{ $labelClass }}" for="email">Email</label>
                <input
                    class="{{ $inputClass }}"
                    id="email"
                    name="email"
                    type="email"
                    autocomplete="email"
                    inputmode="email"
                    required
                    autofocus
                >
            </div>

            <div>
                <label class="{{ $labelClass }}" for="password">Password</label>
                <div class="relative">
                    <input
                        class="{{ $inputClass }} pr-10"
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        required
                    >
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

            <button
                type="submit"
                class="mt-2 flex h-10 w-full cursor-pointer items-center justify-center rounded-action border-0 bg-primary text-s font-medium text-btn-primary transition-colors duration-fast ease-smooth hover:bg-primary-hover"
            >
                Sign in
            </button>
        </form>

        <p class="mt-6 text-center text-s text-gray2-dark">
            Don't have an account?
            <a href="{{ route('register') }}" class="font-medium text-primary no-underline transition-colors duration-fast ease-smooth hover:text-primary-hover">Sign up</a>
        </p>
    </div>
@endsection
