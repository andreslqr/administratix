@props([
    'options' => false
])


@php
    $wireOptions = $attributes->wire('options')->value; 
    $varOptions = $wireOptions ? new Illuminate\Support\HtmlString("\$wire.entangle('{$wireOptions}')") : json_encode($options);

@endphp

<div
    wire:ignore
    x-data="{ 
        element: null,
        instance: null,
        options: {{ $varOptions }},
    }
    "
    x-init="
    element = $el.children.item(0);
        instance = new window.ApexCharts(element, {
            ...{
                events: {
                    animationEnd: function() {
                        $wire.emit(`${options.wireModel}-animationEnd`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    beforeMount: function() {
                        $wire.emit(`${options.wireModel}-beforeMount`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    mounted: function() {
                        $wire.emit(`${options.wireModel}-mounted`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    updated: function() {
                        $wire.emit(`${options.wireModel}-updated`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    mouseMove: function() {
                        $wire.emit(`${options.wireModel}-mouseMove`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    mouseLeave: function() {
                        $wire.emit(`${options.wireModel}-mouseLeave`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    click: function() {
                        $wire.emit(`${options.wireModel}-click`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    legendClick: function() {
                        $wire.emit(`${options.wireModel}-legendClick`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    markerClick: function() {
                        $wire.emit(`${options.wireModel}-markerClick`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    xAxisLabelClick: function() {
                        $wire.emit(`${options.wireModel}-xAxisLabelClick`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    selection: function() {
                        $wire.emit(`${options.wireModel}-selection`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    dataPointSelection: function() {
                        $wire.emit(`${options.wireModel}-dataPointSelection`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    dataPointMouseEnter: function() {
                        $wire.emit(`${options.wireModel}-dataPointMouseEnter`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    dataPointMouseLeave: function() {
                        $wire.emit(`${options.wireModel}-dataPointMouseLeave`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    beforeZoom: function() {
                        $wire.emit(`${options.wireModel}-beforeZoom`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    beforeResetZoom: function() {
                        $wire.emit(`${options.wireModel}-beforeResetZoom`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    zoomed: function() {
                        $wire.emit(`${options.wireModel}-zoomed`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                    scrolled: function() {
                        $wire.emit(`${options.wireModel}-scrolled`, ...Object.values(arguments).filter(argument => ['number', 'string', 'boolean'].includes(typeof argument) || Array.isArray(argument)));
                    },
                }
            },
            ...options.options
        });
        instance.render();
        $watch('options', (newOptions) => {
            instance.updateOptions(newOptions.options);
        });
        @if($wireOptions)
            $wire.on(`apexcharts-${options.wireModel}`, (functionName, args) => instance[functionName](...Object.values(args)));
        @endif
    "
    >
    <div></div>
</div>

@once
    @push('scripts')
        @vite('resources/admin/js/plugins/apexcharts.js')
    @endpush
@endonce