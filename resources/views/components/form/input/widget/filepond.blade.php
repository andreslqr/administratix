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
        options: {{ $varOptions }},
        events: [
            'init',
            'warning',
            'warning',
            'initfile',
            'addfilestart',
            'addfileprogress',
            'addfile',
            'processfilestart',
            'processfileprogress',
            'processfileabort',
            'processfilerevert',
            'processfile',
            'processfiles',
            'removefile',
            'preparefile',
            'updatefiles',
            'activatefile',
            'reorderfiles'
        ]
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
    @if($wireOptions)
        $wire.on('filepond-{{ $wireModel }}', (functionName, args) => instance[functionName](...Object.values(args)));
    @endif
    events.forEach(eventName => {
        instance.on(eventName, function() {
            $wire.emit(`{{ $wireModel }}-${eventName}`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
        });
    })
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