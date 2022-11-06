@props([])


<div {{ $attributes->merge(['class' => 'avatar-group -space-x-6']) }}>
    {{ $slot }}
</div>