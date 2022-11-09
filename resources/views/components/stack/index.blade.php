@props([

])

<div {{ $attributes->merge(['class' => 'stack']) }}>
    {{ $slot }}
</div>