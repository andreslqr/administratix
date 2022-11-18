@props([
    
])


@php
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');


    $var = $value ?? '{}';

    
    
    if ($name) {
        $var = new \Illuminate\Support\HtmlString("\$wire.entangle('{$name}')" . ($defer ? '.defer' : ''));
    }
    
@endphp


<div {{ $attributes->merge(['class' => 'mockup-window border bg-base-300'])->whereDoesntStartWith('wire') }} x-data="{ content: {{ $var }}, instance: null }" x-init="instance = new Editor({
    holder: $el,
    data: content,
    onChange: async (api, e) => content = await instance.save(),
    
})" wire:ignore>

</div>