@php
    $authCardClass = "flex flex-col gap-6 mx-auto w-full max-w-[400px] pt-11 px-10 pb-5 rounded-form border border-overlay-6 bg-background-main shadow-card";
@endphp

<div {{ $attributes->class($authCardClass) }}>{{ $slot }}</div>