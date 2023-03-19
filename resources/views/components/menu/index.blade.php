@props([
    'compact' => false,
    'horizontal' => false,
    'rounded' => false
])

<ul {{ $attributes->merge(['class' => 'menu'])->class(['rounded-box' => $rounded, 'menu-compact' => $compact, 'menu-horizontal' => $horizontal]) }}>
    {{ $slot }}
</ul>