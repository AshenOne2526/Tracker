@props([
    'name',
    'id' => null,
])

@php
    $inputId = $id ?? $name;

    $rootClass = 'flex cursor-pointer select-none items-start gap-2.5';
    $inputClass = 'peer sr-only';
    $markClass = 'inline-flex size-5 shrink-0 items-center justify-center rounded-[6px] border-[1.5px] border-gray3-light bg-background-main text-transparent transition-[background-color,border-color,color] duration-fast ease-smooth peer-checked:border-primary peer-checked:bg-primary peer-checked:text-white peer-focus-visible:outline-2 peer-focus-visible:outline-offset-2 peer-focus-visible:outline-primary/65 peer-disabled:cursor-not-allowed peer-disabled:bg-background-content peer-disabled:opacity-45';
    $labelClass = 'text-s text-gray2-dark peer-disabled:cursor-not-allowed peer-disabled:opacity-55';
@endphp

<label {{ $attributes->only('class')->class($rootClass) }}>
    <input
        {{ $attributes->except('class')->class($inputClass)->merge([
            'type' => 'checkbox',
            'id' => $inputId,
            'name' => $name,
        ]) }}
    >
    <span class="{{ $markClass }} mt-0.5" aria-hidden="true">
        <svg width="10" height="8" viewBox="0 0 10 8" aria-hidden="true">
            <path d="M1 4L3.5 6.5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
        </svg>
    </span>
    @if ($slot->isNotEmpty())
        <span class="{{ $labelClass }}">{{ $slot }}</span>
    @endif
</label>
