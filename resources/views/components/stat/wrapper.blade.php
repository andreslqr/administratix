@props([
    'vertical' => false,
    'noAutoWrap' => true
])


<div {{ $attributes->merge(['class' => 'stats'])->class(['stats-vertical' => $vertical]) }}>
    {{ $slot }}
</div>