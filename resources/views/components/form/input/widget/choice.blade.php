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
    <select x-init="instance = new Choices($el, {
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
            containerOuter: 'choices',
            containerInner: '{{ $attributes->merge(['class' => 'input input-bordered'])->get('class') }}',
            input: 'choices__input',
            inputCloned: 'choices__input--cloned',
            list: 'menu',
            listItems: 'choices__list--multiple',
            listSingle: 'h-full justify-center',
            listDropdown: 'choices__list--dropdown',
            item: 'choices__item',
            itemSelectable: 'choices__item--selectable',
            itemDisabled: 'choices__item--disabled',
            itemChoice: 'choices__item--choice',
            placeholder: 'choices__placeholder',
            group: 'choices__group',
            groupHeading: 'choices__heading',
            button: 'choices__button',
            activeState: 'is-active',
            focusState: 'is-focused',
            openState: 'is-open',
            disabledState: 'is-disabled',
            highlightedState: 'is-highlighted',
            selectedState: 'is-selected',
            flippedState: 'is-flipped',
            loadingState: 'is-loading',
            noResults: 'has-no-results',
            noChoices: 'has-no-choices'
        },
    })">

    </select>
</div>
