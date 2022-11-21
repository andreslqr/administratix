@props([
    'logLevel' => 'ERROR',
    'allChanges' => false
])


@php
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');


    $var = $value ?? '{}';

    
    
    if ($name) {
        $var = new \Illuminate\Support\HtmlString("\$wire.entangle('{$name}')" . ($defer ? '.defer' : ''));
    }
    
@endphp


<div {{ $attributes->merge(['class' => 'mockup-window border bg-base-100 px-3'])->whereDoesntStartWith('wire') }} x-data="{ content: {{ $var }}, instance: null }" x-init="instance = new Editor({
        holder: $el,
        data: content,
        @if($allChanges)
            onChange: async (api, e) => content = await instance.save(),
        @else
            onChange: async (api, e) => e.type === 'block-added' ? content = await instance.save() : null,
        @endif
        tools: window.editorPlugins,
        logLevel: '{{ $logLevel }}'
    });
    {{-- $watch('content', value => instance.render(value)) --}}
    " 
wire:ignore>

</div>