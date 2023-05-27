@props([
    'options' => false
])

@php
    $wireModel = $attributes->wire('model')->value;
    $wireOptions = $attributes->wire('options')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');
    
    $varModel = $wireModel ? new \Illuminate\Support\HtmlString("\$wire.entangle('{$wireModel}')" . ($defer ? '.defer' : '')) : 'null';
    $varOptions = $wireOptions ? new Illuminate\Support\HtmlString("\$wire.entangle('{$wireOptions}')") : json_encode($options);

@endphp

<div 
    wire:ignore
    x-data="{ 
        instance: null,
        element: null,
        value: {{ $varModel }},
        options: {{ $varOptions }}
    }"
    x-init="
        element = $el.children.item(0);
        instance = FilePond.create(element, {
        ...{
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, tranfer, opts) => { 

                    if(options.options && options.options.allowMultiple)
                        value = value ? value : [];

                    $wire.upload(
                        '{{ $wireModel }}', 
                        file, 
                        load,
                        abort, 
                        (e) => progress(e.lengthComputable, e.loaded, e.total)
                    );
                },
                revert: (fileId, load, error) => {
                    $wire.removeUpload('{{ $wireModel }}', fileId, load);

                } 
            }
        },
        ...options.options
    });
    $watch('options', (newConfig) => instance.setOptions(newConfig.options));
    "
    >
    <input {{ $attributes->whereDoesntStartWith('wire')->merge(['type' => 'file']) }} />
</div>



@once
    @push('styles')
        @vite('resources/admin/sass/plugins/filepond.scss')
    @endpush
    @push('scripts')
        @vite('resources/admin/js/plugins/filepond.js')
    @endpush
@endonce