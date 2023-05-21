{{-- WIP --}}
@props([
    'withoutDefer' => false,
    'id' => null
])

@php
    $wireModel = $attributes->wire('model')->value;
    $wireOptions = $attributes->wire('options')->value;
    $defer = ! $withoutDefer;

    $varModel = $wireModel ? new \Illuminate\Support\HtmlString("\$wire.entangle('{$wireModel}')" . ($defer ? '.defer' : '')) : '{}';
    $varOptions = $wireOptions ? new Illuminate\Support\HtmlString("\$wire.entangle('{$wireOptions}')") : json_encode($options);
    $id = $id ?: $wireModel;
@endphp

<div wire:ignore
    x-data="{
        instance: null,
        value: {{ $varModel }},
        options: {{ $varOptions }}
    }"
    x-init="
        $watch('options', (newConfig) => {
            
        });
    "
    >
    <textarea id="{{ $id }}" x-init="
        instance = tinymce.init({
            target: $el,
            setup: function(editor) {
                editor.on('Change', e => value = editor.getContent())
            },
            file_picker_callback: (callback, value, meta) => {
            
            },
            images_upload_handler: (blobInfo, progress) => new Promise((resolve, reject) => {

            }),
            ...options.options
        });
        $watch('value', (newValue) => {
            tinymce.get('{{ $id }}').setContent(newValue);
        });
    ">
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