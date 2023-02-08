@props([
    'outline' => false,
    'ghost' => false,
    'content'
])

<span {{ $attributes->merge(['class' => 'badge'])->class(['badge-outline' => $outline, 'badge-ghost' => false]) }}>
    {{ $content ?? $slot }}
</span>