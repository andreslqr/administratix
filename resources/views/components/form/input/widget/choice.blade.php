@props([
    'options' => false
])


@php 
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');

     $var = $value ?? '0';

    if($name) 
        $var = new \Illuminate\Support\HtmlString("\$wire.entangle('{$name}')" . ($defer ? '.defer' : ''));

@endphp

<div x-data="{selected: {{ $var }},  instance: null}" x-init="$watch('selected', (value) => instance.setChoiceByValue(value))" wire:ignore>
    <select multiple x-init="instance = new Choices($el, {
            @if($options) 
                choices: @js($options), 
            @endif
                classNames: {
                    
                },
        });
        instance.passedElement.element.addEventListener('change', (e) => console.log(1));
        instance.passedElement.element.addEventListener('change', (e) => selected = instance.getValue(true));
    ">

    </select>
</div>
