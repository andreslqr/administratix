@props([
    'name',
    'values',
    'max',
    'maskClass' => 'mask-star'
])

@php
    $name = $attributes->wire('model')->value ?: $name;
@endphp

<div {{ $attributes->merge(['class' => 'rating']) }}>

    @foreach ($values ?? range(0, $max) as $item)
        <input type="radio" {{ $attributes->whereStartsWith('wire:model') }} name="{{ $name }}" value="{{ $item }}" class="mask {{ $maskClass }}" />
    @endforeach

</div>
