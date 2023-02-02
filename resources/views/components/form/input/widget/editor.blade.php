@props([
    'logLevel' => 'ERROR',
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
        onChange: async (api, e) => {
            let data = await instance.save();
            $wire.set('{{ $name }}' @if($defer) , true @endif);
        },
        tools: window.editorPlugins,
        logLevel: '{{ $logLevel }}'
    });
    $watch('content', value => instance.render(value))
    " 
wire:ignore>

</div>

@once
    @push('scripts')
        @vite('resources/admin/js/plugins/editor.js')
    @endpush
@endonce