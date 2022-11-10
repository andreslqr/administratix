@props([
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
    'inputWrapperComponent' => config('administratix.views.components.form.input.wrapper.view'),
    'iconComponent' => config('administratix.views.components.icon.awesome.view'),
    'iconName' => 'dollar-sign',
])


<x-dynamic-component :component="$inputWrapperComponent">
    <span>
        <x-dynamic-component :component="$iconComponent" :name="$iconName" />
    </span>
    <x-dynamic-component :component="$inputComponent" :attributes="$attributes" x-mask:dynamic="$money($input)"/>
</x-dynamic-component>





