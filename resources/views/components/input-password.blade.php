@props([
    'id' => null,
    'name',
])

@php
    $inputId = $id ?? $name;
    $buttonClass = "absolute top-1/2 right-2 flex size-8 -translate-y-1/2 cursor-pointer items-center justify-center rounded-action border-0 bg-transparent text-gray2-dark transition-colors duration-fast ease-smooth hover:text-gray3-dark focus-visible:outline-none";
@endphp

<div class="relative">
    <x-input
        :id="$inputId"
        :name="$name"
        type="password"
        :attributes="$attributes->class('pr-10')"
    />
    <button
        type="button"
        class="{{ $buttonClass }}"
        data-password-toggle
        aria-label="Show password"
        aria-controls="{{ $inputId }}"
        aria-pressed="false"
    >
        <svg data-password-icon="show" class="size-icon fill-current" aria-hidden="true"><use href="#icon-eye"></use></svg>
        <svg data-password-icon="hide" class="hidden size-icon fill-current" aria-hidden="true"><use href="#icon-eye-slash"></use></svg>
    </button>
</div>