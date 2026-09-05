@props([
    'for' => null,
])

@php
    $labelClass = 'mb-1.5 block text-s font-medium text-gray6-dark';
@endphp

<label
    {{ $attributes->class($labelClass)->merge($for ? ['for' => $for] : []) }}
>
    {{ $slot }}
</label>