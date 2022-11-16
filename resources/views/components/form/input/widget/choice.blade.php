@props([
    'multiple' => false,
    'options' => false,
    'keyName',
    'valueName',
    'config' => [],
    'withoutDataTransformation' => false 
])


@php
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');
    $source = $attributes->wire('source')->value;


    $var = $value ?? '0';

    if($options && !$withoutDataTransformation) {
        $options = \Illuminate\Support\Collection::wrap($options)->mapWithKeys(fn($item, $key) => [['value' => isset($valueName) ? $item[$valueName] : $key, 'label' => isset($keyName) ? $item[$keyName] : $item]]);
    }
    
    if ($name) {
        $var = new \Illuminate\Support\HtmlString("\$wire.entangle('{$name}')" . ($defer ? '.defer' : ''));
    }
    
@endphp

<div x-data="{ selected: {{ $var }}, instance: null, @if($source) source: async (value) => {
    let items = await $wire.call('{{ $source }}', value);

    if(Array.isArray(items)) {
        items = items.map((item, index) => {
            return {
                label: @if(isset($keyName)) item['{{ $keyName }}'] @else item @endif,
                value: @if(isset($valueName)) item['{{ $valueName }}'] @else index @endif,
            };
        });
    }
    else if(typeof items == 'object') {
        items = Object.keys(items).map((key) => {
            return {
                label: items[key]@if(isset($keyName))['{{ $keyName }}']@endif,
                value: @if(isset($valueName))items[key]['{{ $valueName }}']@else key @endif
            };
        });
    }
    
    return items;

} @endif }" x-init="$watch('selected', value => instance.removeActiveItems() && instance.setChoiceByValue(value))" wire:ignore>
    <select @if($multiple) multiple @endif x-init="instance = new Choices($el, {
        ...{
            @if($options && !$source)
                choices: @js($options),
            @endif
        },
        ...@js($config)
    });
    instance.passedElement.element.addEventListener('change', (e) => selected = instance.getValue(true));
    @if($source)
        instance.passedElement.element.addEventListener('search', (e) => instance.setChoices(() => source(e.detail.value)));
        instance.passedElement.element.addEventListener('change', (e) => instance.setChoices(() => source(e.detail.value)));
        instance.passedElement.element.addEventListener('showDropdown', (e) => instance.setChoices(() => source(e.detail.value)));
    @endif
    ">

    </select>
</div>
