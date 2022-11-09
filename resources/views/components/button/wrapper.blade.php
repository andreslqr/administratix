@props([
    'vertical' => false,
])


<div {{ $attributes->merge(['class' => 'btn-group'])->class(['btn-group-vertical' => $vertical]) }}>
    {{ $slot }}
</div>