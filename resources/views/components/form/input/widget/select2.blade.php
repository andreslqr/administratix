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
            $(element).empty().select2('destroy').trigger('change');
            instance = $(element).select2({
                ...{
                    dropdownParent: element.parentElement,
                    {{ $wireSearch ? new Illuminate\Support\HtmlString('matcher: (params, data) => {
                        search = params.term;
                        console.log(params.term);
                        return data;
                    },') : '' }} 
                },
                ...options.options
            });

        });
        @if($wireOptions)
            $wire.on('select2-{{ $wireModel }}', (functionName, args) => {
                console.log(5);
                $(element).select2(functionName);
            });
        @endif
        @if($wireSearch)
            $watch('search', (value) => {
                $(element).select2('open');
                $($el).find('textarea').val(value);
            });
        @endif
    "
>

<x-dynamic-component  :component="$selectComponent" :attributes="$attributes->whereDoesntStartWith('wire')" without-placeholder
    x-init="
        element = $el;
        instance = $(element).select2({
            ...{
                dropdownParent: element.parentElement,
                {{ $wireSearch ? new Illuminate\Support\HtmlString('matcher: (params, data) => {
                    if(params.term !== undefined)
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