@props([
    'vertical' => false  
])

<label {{ $attributes->merge(['class' => 'input-group'])->class(['input-group-vertical' => $vertical]) }}>
    {{ $slot }}
</label>