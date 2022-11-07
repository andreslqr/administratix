@props([
    'content'
])

<div {{ $attributes->merge(['class' => 'tooltip', 'data-tip' => $content]) }}>
    {{ $slot }}
</div>