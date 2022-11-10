@props([
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
    'inputWrapperComponent' => config('administratix.views.components.form.input.wrapper.view'),
    'iconComponent' => config('administratix.views.components.icon.awesome.view'),
    'iconName' => 'credit-card',
    'placeholder' => config('administratix.views.components.form.input.widget.credit-card.default-placeholder'),
])


<x-dynamic-component :component="$inputWrapperComponent">
    <span>
        <x-dynamic-component :component="$iconComponent" :name="$iconName" />
    </span>
    <x-dynamic-component :component="$inputComponent" :attributes="$attributes->merge(['placeholder' => $placeholder])" x-mask="9999 9999 9999 9999"/>
</x-dynamic-component>





