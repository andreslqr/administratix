@props([
    'jqueryComponent' => config('administratix.views.components.widget.jquery.view'),
    'selectComponent' => config('administratix.views.components.form.input.select.view'),
    'options' => false
])

@php
    $wireModel = $attributes->wire('model')->value;
    $wireOptions = $attributes->wire('options')->value;
    $wireSearch = $attributes->wire('search')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');

    $varModel = $wireModel ? new \Illuminate\Support\HtmlString("\$wire.entangle('{$wireModel}')" . ($defer ? '.defer' : '')) : 'null';
    $varOptions = $wireOptions ? new Illuminate\Support\HtmlString("\$wire.entangle('{$wireOptions}')") : json_encode($options);
    $varSearch = $wireSearch ? new \Illuminate\Support\HtmlString("\$wire.entangle('{$wireSearch}')" . ($attributes->wire('search')->hasModifier('defer') ? '.defer' : '')) : 'null';
@endphp


<div
    wire:ignore
    x-data="{
        instance: null,
        element: null,
        value: {{ $varModel }},
        options: {{ $varOptions }},
        @if($wireSearch)
            'search': {{ $varSearch }},
        @endif
    }"
    x-init="
        $watch('options', (newConfig) => {
            instance.select2('destroy');
            instance = $(element).select2({
                ...{
                    dropdownParent: element.parentElement,
                    @if($wireSearch) 
                        matcher: (params, data) => {
                            console.log(params.term)
                            search = params.term;
                            return data;
                        },
                    @endif
                },
                ...options.options
            });
            instance.select2('open');
            $($el).find('textarea').val(search);
        });
    "
>

<x-dynamic-component  :component="$selectComponent" :attributes="$attributes->whereDoesntStartWith('wire')" without-placeholder
    x-init="
        element = $el;
        instance = $(element).select2({
            ...{
                dropdownParent: element.parentElement,
                {{ $wireSearch ? new Illuminate\Support\HtmlString('matcher: (params, data) => {
                    search = params.term;
                    return data;
                },') : '' }} 
            },
            ...options.options
        });
        instance.on('change', (e) => value = instance.val());
        $watch('value', (newValue) => instance.val(newValue).trigger('change.select2'));
    ">
    {{ $slot }}
</x-dynamic-component>

</div>






@once
    @push('styles')
        @vite('resources/admin/sass/plugins/select2.scss')
    @endpush
    @push('scripts')
        <x-dynamic-component :component="$jqueryComponent">
        </x-dynamic-component>
        @vite('resources/admin/js/plugins/select2.js')
    @endpush
@endonce