@props([
    'multiple' => false
])

@php 
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');
@endphp
<div x-data="{ files: null }" wire:ignore>
    <input {{ $attributes->merge(['multiple' => $multiple])->whereDoesntStartWith('wire') }} x-init="FilePond.create($el, {
        server: {
            process: (fieldName, file, metadata, load, error, progress, abort, tranfer, options) => {
                console.log(file);
                @if($multiple)
                    @this.uploadMultiple('{{ $name }}', file, () => load(), () => abort(), (e) => progress(e.lengthComputable, e.loaded, e.total));
                @else
                    @this.upload('{{ $name }}', file, () => load(), () => abort(), (e) => progress(e.lengthComputable, e.loaded, e.total));
                @endif
            }  
        }
    })" >
</div>