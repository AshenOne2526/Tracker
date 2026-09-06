@props([
    'type' => null,
    'buttonType' => 'submit',
    'textSize' => 's',
])

@php
    $variant = in_array($type, ['secondary', 'danger'], true) ? $type : 'primary';

    $textClass = [
        's' => 'text-s',
        'm' => 'text-m',
        'l' => 'text-l',
    ][$textSize] ?? 'text-s';

    $baseClass = 'inline-flex h-10 cursor-pointer items-center justify-center gap-2 rounded-button px-4 font-medium whitespace-nowrap transition-[background-color,border-color,opacity] duration-fast ease-smooth disabled:cursor-not-allowed disabled:opacity-45';

    $variantClass = [
        'primary' => 'border-0 bg-primary text-btn-primary hover:bg-primary-hover',
        'secondary' => 'border-[0.5px] border-border-secondary bg-gray6-light text-btn-secondary hover:bg-button-secondary-hover',
        'danger' => 'border-[0.5px] border-border-secondary bg-gray6-light text-btn-secondary hover:border-pink-light hover:bg-baked-milk',
    ][$variant];

    
@endphp

<button
    {{ $attributes->class([$baseClass, $variantClass, $textClass])->merge(['type' => $buttonType]) }}
>
    {{ $slot }}
</button>
