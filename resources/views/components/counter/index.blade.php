@props([
    'value'
])


<span {{ $attributes->merge(['class' => 'countdown'] )}}>
    <span style="--value: {{ $value }};"></span>
</span>