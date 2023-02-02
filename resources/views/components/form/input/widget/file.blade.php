@props([
    'multiple' => false
])

@php 
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');
@endphp

<div x-data="{ files: $wire.entangle('{{ $name }}'), instance: null }" wire:ignore x-init="$wire.on('{{ config('administratix.general.livewire.events.file.remove-files') }}', (indexes) => instance.removeFiles(indexes))">
    <input {{ $attributes->merge(['multiple' => $multiple])->whereDoesntStartWith('wire') }} x-init="instance = FilePond.create($el, {
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, tranfer, options) => { 

                    @if($multiple)
                        files = files ? files : [];
                    @endif

                    @this.upload('{{ $name }}', file, load, abort, (e) => progress(e.lengthComputable, e.loaded, e.total));
                },
                revert: (fileId, load, error) => {
                    @this.removeUpload('{{ $name }}', fileId, load);
                } 
            }

        });
    ">
</div>

@once
    @push('styles')
        @vite('resources/admin/sass/plugins/filepond.scss')
    @endpush
    @push('scripts')
        @vite('resources/admin/js/plugins/filepond.js')
    @endpush
@endonce