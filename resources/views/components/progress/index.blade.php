@props([
    'value' => false,
    'max' => false
])

<progress {{ $attributes->merge(['class' => 'progress', 'value' => $value, 'max' => $max]) }}>
</progress>