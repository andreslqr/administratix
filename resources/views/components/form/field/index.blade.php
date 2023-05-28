@props([
    'controlComponent' => config('administratix.views.components.form.control.view'),
    'inputComponent' => config('administratix.views.components.form.input.text.view'),
    'labelComponent' => config('administratix.views.components.form.label.view'),
    'errorComponent' => config('administratix.views.components.form.feedback.error.view'),
    'helpComponent'  => config('administratix.views.components.form.feedback.help.view'),
    'help' => false,
    'name' => false,
    'id' => false
])

@php
    $name = $name ?: $attributes->wire('model')->value;
    $id = $id ?: md5($name) ?: false;

    $formattedName = \Illuminate\Support\Str::of(__($name))->snake()->lower()->ucfirst()->toString();
@endphp



<x-dynamic-component :component="$controlComponent">

    <x-dynamic-component :component="$labelComponent" :for="$id">
        <x-slot:content :class="$errors->has($name) ? 'text-error' : ''">
            {{ $formattedName }}
        </x-slot:content>
        @if($help)
            <x-slot:alt>
                <x-dynamic-component :component="$helpComponent">
                    @lang($help)
                </x-dynamic-component>
            </x-slot:alt>
        @endif
    </x-dynamic-component>

    <x-dynamic-component :component="$inputComponent" :attributes="$attributes" :name="$name" :id="$id" :class="$errors->has($name) ? 'input-error' : ''">
    </x-dynamic-component>

    <x-dynamic-component :component="$labelComponent" :for="$id">
        <x-slot:content>
            <x-dynamic-component :component="$errorComponent" :for="$name" class="label-text-alt">
            </x-dynamic-component>
        </x-slot:content>
    </x-dynamic-component>

</x-dynamic-component>