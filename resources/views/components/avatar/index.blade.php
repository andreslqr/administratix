@props([
    'content',
    'online' => false
])

@php
    $content = isset($content) ? $content : $slot;
    $isImage = filter_var($content, FILTER_VALIDATE_URL);

    if(!$isImage)
        $content = implode('', array_map(fn($item) => substr($item, 0, 1), explode(' ', $content, 2)));

@endphp

<div class="avatar {{ $isImage ? '' : 'placeholder' }} {{ $online ? 'online' : '' }}">
  <div {{ $attributes->merge(['class' => $isImage ? '' : 'bg-neutral-focus text-neutral-content text-3xl']) }}>
    @if($isImage)
        <img src="{{ $content }}" {{ $attributes->whereStartsWith('alt') }} />
    @else
        {{ $content }}
    @endif
  </div>
</div>

