@props([
    'for',
    'alt'
])

<label {{ $attributes->merge(['class' => 'label', 'for' => $for]) }}>
    <span class="label-text">
        {{ $content ?? $slot }}
    </span>
    @isset($alt)
        <span class="label-text-alt">
            {{ $alt }}
        </span>
    @endisset
</label>