@props([
    'normal' => false
])

<div {{ $attributes->merge(['class' => 'breadcrumbs overflow-x-auto'])->class(['text-sm' => ! $normal]) }}>
    <ul>
        {{ $slot }}
    </ul>
</div>