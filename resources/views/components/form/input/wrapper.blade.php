@props([
    'vertical' => false  
])

<div {{ $attributes->merge(['class' => 'input-group'])->class(['input-group-vertical' => $vertical]) }}>
    {{ $slot }}
</div>