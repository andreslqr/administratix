@props([

])

<button {{ $attributes->merge(['class' => '', 'type' => 'button']) }}>
    {{ $slot }}
</button>