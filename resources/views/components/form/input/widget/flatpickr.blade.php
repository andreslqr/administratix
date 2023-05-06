@props([
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
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
        $watch('options', (newConfig) => {
            for (const [option, value] of Object.entries(newConfig.options)) {
                instance.set(option, value);
            }
        });
    @if($wireOptions)
        $wire.on('flatpickr-{{ $wireModel }}', (functionName, args) => {
            instance[functionName](...Object.values(args));
            element.dispatchEvent(new Event('input'));
        });
    @endif
    "
    >
    <x-dynamic-component :component="$inputComponent" :attributes="$attributes->whereDoesntStartWith('wire')"
        x-model="value"
        x-init="
        element = $el;
        instance = flatpickr($el, {
            ...{
                onChange: [
                    (selectedDates) => $el.value,
                    function() {
                        $wire.emit('{{ $wireModel }}-onChange', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ],
                onOpen: [
                    function() {
                        $wire.emit('{{ $wireModel }}-onOpen', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ],
                onClose: [
                    function() {
                        $wire.emit('{{ $wireModel }}-onClose', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ],
                onMonthChange: [
                    function() {
                        $wire.emit('{{ $wireModel }}-onMonthChange', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ],
                onYearChange: [
                    function() {
                        $wire.emit('{{ $wireModel }}-onYearChange', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ],
                onReady: [
                    function() {
                        $wire.emit('{{ $wireModel }}-onReady', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ],
                onValueInput: [
                    function() {
                        $wire.emit('{{ $wireModel }}-onValueInput', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ],
                onValueUpdate: [
                    function() {
                        $wire.emit('{{ $wireModel }}-onValueUpdate', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ],
                onDayCreate: [
                    function() {
                        $wire.emit('{{ $wireModel }}-onDayCreate', ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    }
                ]
            },
            ...options.options
        });
        
    ">
    </x-dynamic-component>

</div>


@once
    @push('styles')
        @vite('resources/admin/sass/plugins/flatpickr.scss')
    @endpush
    @push('scripts')
        @vite('resources/admin/js/plugins/flatpickr.js')
    @endpush
@endonce