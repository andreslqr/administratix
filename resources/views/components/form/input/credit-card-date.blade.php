@props([
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
    'inputWrapperComponent' => config('administratix.views.components.form.input.wrapper.view'),
    'iconComponent' => config('administratix.views.components.icon.awesome.view'),
    'iconName' => 'calendar',
    'placeholder' => config('administratix.views.components.form.input.widget.credit-card-date.default-placeholder'),
])


<x-dynamic-component :component="$inputWrapperComponent">
    <span>
        <x-dynamic-component :component="$iconComponent" :name="$iconName" />
    </span>
    <x-dynamic-component :component="$inputComponent" :attributes="$attributes->merge(['placeholder' => $placeholder])" x-mask="99/99"/>
</x-dynamic-component>





