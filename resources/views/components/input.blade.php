@props([
    'id' => null,
    'name',
])

@php
    $inputId = $id ?? $name;
    $inputClass = 'h-10 w-full rounded-input border border-border bg-background-main px-3 text-s font-medium text-body outline-none transition-[border-color] duration-fast ease-smooth placeholder:text-gray2-dark placeholder:font-medium placeholder:text-s focus:border-primary';
@endphp

<input
    {{ $attributes->class($inputClass)->merge([
        'id' => $inputId,
        'name' => $name,
        'type' => 'text'
    ])}}
>