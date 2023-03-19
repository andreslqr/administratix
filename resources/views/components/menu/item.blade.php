@props([
    'content',
    'active' => false,
    'asTitle' => false,
    'bordered' => false,
    'borderedOnHover' => false,
    'disabled' => false,
    'anchorClass' => null
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


<li {{ $attributes->class([
                'menu-title' => $asTitle, 
                'bordered' => $bordered, 
                'hover-bordered' => $borderedOnHover, 
                'disabled' => $disabled
            ])->filter(fn ($value, $key) => !in_array($key, $anchorAttributes)) }}>

    <a {{ $attributes->filter(fn ($value, $key) => in_array($key, $anchorAttributes))  }} class="{{ $anchorClass }} @if($active) active @endif">
        {{ $content ?? $slot }}
    </a>

</li>