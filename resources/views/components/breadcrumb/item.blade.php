@props([
    'name'
])

@php
    $anchorAttributes = [
        'href',
        'target',
        'hreflang',
        'referrerpolicy',
        'rel'
    ];
@endphp

<li {{ $attributes->filter(fn ($value, $key) => !in_array($key, $anchorAttributes)) }}>
    <a {{ $attributes->filter(fn ($value, $key) => in_array($key, $anchorAttributes)) }}>
        {{ $name ?? $slot }}
    </a>
</li>