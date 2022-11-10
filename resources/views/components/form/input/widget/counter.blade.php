@props([
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
    'buttonComponent' => config('administratix.views.components.button.view'),
    'inputWrapperComponent' => config('administratix.views.components.form.input.wrapper.view'),
    'iconComponent' => config('administratix.views.components.icon.awesome.view'),
    'iconName' => 'calendar',
    'placeholder' => config('administratix.views.components.form.input.widget.credit-card-date.default-placeholder'),
    'color' => '',
    'leftIconName' => 'minus',
    'rightIconName' => 'plus',
    'step' => 1
])

@php
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');

    $var = '0';

    if($name) 
        $var = new \Illuminate\Support\HtmlString("\$wire.entangle('{$name}')" . ($defer ? '.defer' : ''));
    
@endphp



<x-dynamic-component :component="$inputWrapperComponent" x-data="{value: {{ $var }}}">
    <x-dynamic-component :component="$buttonComponent" class="{{ $color }}" x-on:click="value -= {{ $step }}">
        <x-dynamic-component :component="$iconComponent" :name="$leftIconName" />
    </x-dynamic-component>
    <x-dynamic-component :component="$inputComponent" :attributes="$attributes->whereDoesntStartWith('wire:model')"  type="number" x-model="value" />
    <x-dynamic-component :component="$buttonComponent"  class="{{ $color }}" x-on:click="value += {{ $step }}">
        <x-dynamic-component :component="$iconComponent" :name="$rightIconName" />
    </x-dynamic-component>
</x-dynamic-component>





