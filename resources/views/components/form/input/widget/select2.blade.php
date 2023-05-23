@props([
    'jqueryComponent' => config('administratix.views.components.widget.jquery.view'),
    'selectComponent' => config('administratix.views.components.form.input.select.view'),
    'options' => false,
    'events' => [
        'change',
        'change.select2',
        'select2:closing',
        'select2:close',
        'select2:opening',
        'select2:open',
        'select2:selecting',
        'select2:select',
        'select2:unselecting',
        'select2:unselect',
        'select2:clearing',
        'select2:clear'
    ]
])

@php
    $wireModel = $attributes->wire('model')->value;
    $wireOptions = $attributes->wire('options')->value;
    $wireSearch = $attributes->wire('search')->value;
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
        searchFunction: '{{ $wireSearch }}',
        'events': [
            'change',
            'change.select2',
            'select2:closing',
            'select2:close',
            'select2:opening',
            'select2:open',
            'select2:selecting',
            'select2:select',
            'select2:unselecting',
            'select2:unselect',
            'select2:clearing',
            'select2:clear'
        ]
    }"
    x-init="
        $watch('options', (newConfig) => {
            $(element).select2('destroy').trigger('change');
            instance = $(element).select2({
                ...{
                    dropdownParent: element.parentElement,
                    {{ $wireSearch ? new Illuminate\Support\HtmlString('ajax: {
                        data: (params) => {
                            return {
                                term: params.term,
                                page: params.page
                            };
                        },
                        transport: (params, success, failure) => {
                            $wire.call(searchFunction, params.term, params.page)
                                .then(success)
                                .catch(failure);
                        
                        }
                    },') : '' }} 
                },
                ...options.options
            });

        });
        @if($wireOptions)
            $wire.on('select2-{{ $wireModel }}', (functionName, args) => $(element).select2(functionName));
        @endif
    "
>

<x-dynamic-component  :component="$selectComponent" :attributes="$attributes->whereDoesntStartWith('wire')" without-placeholder
    x-init="
        element = $el;
        instance = $(element).select2({
            ...{
                dropdownParent: element.parentElement,
                {{ $wireSearch ? new Illuminate\Support\HtmlString('ajax: {
                    data: (params) => {
                        return {
                            term: params.term,
                            page: params.page
                        };
                    },
                    transport: (params, success, failure) => {
                        $wire.call(searchFunction, params.data.term, params.data.page)
                            .then(success)
                            .catch(failure);
                    
                    }
                },') : '' }} 
            },
            ...options.options
        });
        instance.on('change', (e) => value = instance.val());
        $watch('value', (newValue) => instance.val(newValue).trigger('change.select2'));
        events.forEach(eventName => {
            $(element).on(eventName, function() {
                $wire.emit(`{{ $wireModel }}-${eventName}`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
            });
        })
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