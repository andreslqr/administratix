@props([
    'content'
])


<kbd {{ $attributes->merge(['class' => 'kbd']) }}>
    {{ $content ?? $slot }}
</kbd>