@props([
    'for'
])

@error($for)
    <span {{ $attributes->merge(['class' => 'text-xs text-error']) }}>
        {{ $message }}
    </span>
@enderror