@props([
    'active' => false,
    'asTitle' => false,
    'bordered' => false,
    'borderedOnHover' => false,
    'disabled' => false
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
                'active' => $active, 
                'menu-title' => $asTitle, 
                'bordered' => $bordered, 
                'hover-bordered' => $borderedOnHover, 
                'disabled' => $disabled
            ])->filter(fn ($value, $key) => in_array($key, $anchorAttributes)) }}>

    <a {{ $attributes->filter(fn ($value, $key) => in_array($key, $anchorAttributes))  }}>
        {{ $slot }}
    </a>

</li>