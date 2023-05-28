@props([
    'for',
    'alt'
])

<label {{ $attributes->merge(['class' => 'label', 'for' => $for]) }}>
    @if(isset($content))
        <span {{ $content->attributes->merge(['class' => 'label-text']) }}>
            {{ $content }}
        </span>
    @else
        <span class="label-text">
            {{ $slot }}
        </span>
    @endif
    @isset($alt)
        <span class="label-text-alt">
            {{ $alt }}
        </span>
    @endisset
</label>