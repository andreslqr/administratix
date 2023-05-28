@props([
    'options' => false,
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
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
        element: null,
        id: null,
        value: {{ $varModel }},
        options: {{ $varOptions }},
    }"
    x-init="
        id = id ? id : 'coloris-input-' + Math.random().toString(16).slice(2);
        
        element = $el.children.item(0);
        element.setAttribute('id', id);
        element.value = value;
        window.Coloris({
            ...{
                el: `#${id}`,
                a11y: {
                    open: '{{ __('Open color picker') }}',
                    close: '{{ __('Close color picker') }}',
                    clear: '{{ __('Clear the selected color') }}',
                    marker: '{{ __('Saturation: {s}. Brightness: {v}.') }}',
                    hueSlider: '{{ __('Hue slider') }}',
                    alphaSlider: '{{ __('Opacity slider') }}',
                    input: '{{ __('Color value field') }}',
                    format: '{{ __('Color format') }}',
                    swatch: '{{ __('Color swatch') }}',
                    instruction: '{{ __('Saturation and brightness selector. Use up, down, left and right arrow keys to select.') }}'
                  }
            },
            ...options.options
        });
        $watch('options', (newOptions) => {
            window.Coloris.setInstance(`#${id}`, {
                ...newOptions.options
            });   
        });
    "
    >
    <x-dynamic-component :component="$inputComponent" :attributes="$attributes->whereDoesntStartWith('wire')" x-model="value" />
</div>



@once
    @push('styles')
        @vite('resources/admin/sass/plugins/coloris.scss')
    @endpush
    @push('scripts')
        @vite('resources/admin/js/plugins/coloris.js')
    @endpush
@endonce