@props([
    'horizontal' => false
])

<div {{ $attributes->merge(['class' => 'divider'])->class(['divider-horizontal' => $horizontal]) }}>
    {{ $slot }}
</div>