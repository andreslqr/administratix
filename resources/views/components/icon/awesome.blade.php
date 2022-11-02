@props([
    'type' => 'solid',
    'name'
])


<i {{ $attributes->merge(['class' => "fa-{$type} fa-{$name}"])}}>
</i>