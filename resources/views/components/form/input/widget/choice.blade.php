@props([

])


@php 
    $name = $attributes->wire('model')->value;
    $defer = $attributes->wire('model')->hasModifier('defer');

     $var = $value ?? '0';

    if($name) 
        $var = new \Illuminate\Support\HtmlString("\$wire.entangle('{$name}')" . ($defer ? '.defer' : ''));

@endphp

<div x-data="{selected: {{ $var }},  instance: null}" wire:ignore>
    <select multiple x-init="instance = new Choices($el, {
        choices: [{
  value: 'Option 1',
  label: 'Option 1',
  selected: true,
  disabled: false,
},
{
  value: 'Option 2',
  label: 'Option 2',
  selected: false,
  customProperties: {
    description: 'Custom description about Option 2',
    random: 'Another random custom property'
  },
}]
,
        classNames: {
            containerInner: 'flex input input-bordered gap-x-1',
            listItems: 'flex h-full items-center gap-x-1',
            item: 'badge py-2'
        },
    })">

    </select>
</div>
