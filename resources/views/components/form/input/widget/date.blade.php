@props([
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
    'format' => config('administratix.views.components.form.input.widget.date.default-format'),
    'displayFormat' => config('administratix.views.components.form.input.widget.date.display-format'),
    'value',
    'minDate',
    'maxDate'
])


@php
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');

    $var = $value ?? '0';

    if($name) 
        $var = new \Illuminate\Support\HtmlString("\$wire.entangle('{$name}')" . ($defer ? '.defer' : ''));
    

    $livewire = $attributes->wire('input-widget-date')->value;

@endphp


<div x-data="{value: {{ $var }}, instance: null, @if($livewire) open: $wire.entangle('inputWidgetDates.{{ $livewire }}') @endif}" wire:ignore x-ref="container" x-init="$watch('value', value => instance.setDate(value)); @if($livewire) $watch('open', value => value ? instance.open() : instance.close()) @endif">
    <x-dynamic-component :component="$inputComponent" :attributes="$attributes->whereDoesntStartWith('wire')" x-init="instance = flatpickr($el, {
        onChange: () => {
            $refs.hidden.value = $el.value;
            $refs.hidden.dispatchEvent(new Event('input'));
        },
        altInput: true,
        altFormat: '{{ $displayFormat }}',
        format: '{{ $format }}',
        static: true
    })" />
    <input {{ $attributes->whereStartsWith('wire') }} type="hidden" x-model="value" x-ref="hidden" />
</div>


@if($livewire)
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                if(typeof @this.get('inputWidgetDates.{{ $livewire }}') === 'undefined')
                    window.alert("Declare the '{{ $livewire }}' key of the $inputWidgetDates property as a boolean data type");
            });
        </script>
    @endpush
@endif