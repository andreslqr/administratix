@props([
    'outline' => false,
    'content'
])

<span {{ $attributes->merge(['class' => 'badge'])->class(['badge-outline' => $outline]) }}>
    {{ $content ?? $slot }}
</span>