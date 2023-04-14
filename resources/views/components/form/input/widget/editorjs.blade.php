@props([
    'options' => false
])


@php
    $wireModel = $attributes->wire('model')->value;
    $wireOptions = $attributes->wire('options')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');

    $varModel = $wireModel ? new \Illuminate\Support\HtmlString("\$wire.entangle('{$wireModel}')" . ($defer ? '.defer' : '')) : '{}';
    $varOptions = $wireOptions ? new Illuminate\Support\HtmlString("\$wire.entangle('{$wireOptions}')") : json_encode($options);
    
@endphp


<div {{ $attributes->merge(['class' => 'mockup-window border bg-base-100 px-3'])->whereDoesntStartWith('wire') }}
    wire:ignore
    x-data="{
        instance: null,
        value: {{ $varModel }},
        options: {{ $varOptions }}
    }"
    x-init="$watch('options', (newConfig) => {

    });
    
    instance = new Editor({
        holder: $el,
        data: value,
        onChange: async (api, e) => {
            let data = await instance.save();
            $wire.set('{{ $wireModel }}', data @if($defer) , true @endif);
        },
        tools: window.editorPlugins,
        ...options.options
    });
    $watch('value', value => instance.render(value))
    "
    >



</div>

@once
    @push('styles')
        @vite('resources/admin/sass/plugins/editor.scss')
    @endpush
    @push('scripts')
        @vite('resources/admin/js/plugins/editor.js')
    @endpush
@endonce