@props([
    'gap' => config('administratix.views.components.grid.gap'),
    'type' => config('administratix.views.components.grid.type'),
    'sizes' => [],
])


@php

    $sizes = array_merge(config('administratix.views.components.grid.sizes'), $sizes);

    $sizes = array_map(fn($breakpoint, $cols) =>  ( $breakpoint != 'default' ? "{$breakpoint}:" : '') . "grid-{$type}-{$cols}", array_keys($sizes), array_values($sizes));


@endphp

<div {{ $attributes->merge(['class' => "grid grid-flow-col " . implode(" ", $sizes)] )->class(["gap-{$gap}" => !is_null($gap)]) }}>
    {{ $slot }}
</div>