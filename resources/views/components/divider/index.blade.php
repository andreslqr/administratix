@props([
    'content',
    'horizontal' => false
])

<div {{ $attributes->merge(['class' => 'divider'])->class(['divider-horizontal' => $horizontal]) }}>
    {{ $content ?? $slot }}
</div>