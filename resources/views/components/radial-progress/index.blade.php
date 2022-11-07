@props([
    'value' => false,
    'max' => false
])


@php
    $value = ceil(100 / $max * $value);
@endphp

<div {{ $attributes->merge(['class' => 'radial-progress']) }} style="--value: {{ $value }};">
    {{ $value }}%
</div>