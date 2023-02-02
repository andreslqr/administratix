@props([
    'render'
])

@php
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');

    if ($name) {
        $var = new \Illuminate\Support\HtmlString("\$wire.entangle('{$name}')" . ($defer ? '.defer' : ''));
    }

    if(! is_iterable($this->{$name}))
        throw new Exception("Your property '{$name}' is not iterable", 1);
        
@endphp


<div {{ $attributes }} x-data="{ instance: null, items: {{ $var }} }" x-init="instance = Sortable.create($el)" wire:ignore>
    @foreach($this->{$name} as $index => $item)
        {{ new Illuminate\Support\HtmlString(Blade::render($this->{$render}(), ['item' => $item, 'index' => 'index'])) }}
    @endforeach
</div>  