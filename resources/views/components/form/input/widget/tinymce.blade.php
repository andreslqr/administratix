


@php
    $wireModel = $attributes->wire('model')->value;
    $wireOptions = $attributes->wire('options')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');

    $varModel = $wireModel ? new \Illuminate\Support\HtmlString("\$wire.entangle('{$wireModel}')" . ($defer ? '.defer' : '')) : '{}';
    $varOptions = $wireOptions ? new Illuminate\Support\HtmlString("\$wire.entangle('{$wireOptions}')") : json_encode($options);
    
@endphp

<div wire:ignore
    x-data="{
        instance: null,
        value: {{ $varModel }},
        options: {{ $varOptions }}
    }"
    >
    <textarea x-init="instance = tinymce.init({
        target: $el,
        setup: function(editor) {
            editor.on('Change', e => value = editor.getContent())
        },
        file_picker_callback: (callback, value, meta) => {
           
        },
        images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {

        }),
        ...options.options
    })">
    </textarea>

</div>

@once
    @push('styles')
        @vite('resources/admin/sass/plugins/tinymce.scss')
        <style>
            body {
                margin: 0 !important;
            }
        </style>
    @endpush
    @push('scripts')
        @vite('resources/admin/js/plugins/tinymce.js')
    @endpush
@endonce