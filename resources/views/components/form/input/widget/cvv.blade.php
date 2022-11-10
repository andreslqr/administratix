@props([
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
    'inputWrapperComponent' => config('administratix.views.components.form.input.wrapper.view'),
    'iconComponent' => config('administratix.views.components.icon.awesome.view'),
    'text' => 'cvv',
    'placeholder' => config('administratix.views.components.form.input.widget.cvv.default-placeholder'),
])


<x-dynamic-component :component="$inputWrapperComponent">
    <span>
        {{ $text }}
    </span>
    <x-dynamic-component :component="$inputComponent" :attributes="$attributes->merge(['placeholder' => $placeholder])" x-mask="999"/>
</x-dynamic-component>





