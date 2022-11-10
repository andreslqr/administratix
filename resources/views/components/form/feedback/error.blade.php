@props([
    'for'
])

@error($for)
    <span class="text-xs text-error">
        {{ $name }}
    </span>
@enderror