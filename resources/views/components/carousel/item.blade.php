@props([

])

<div {{ $attributes->merge(['class' => 'carousel-item']) }}>
    {{ $slot }}
</div>