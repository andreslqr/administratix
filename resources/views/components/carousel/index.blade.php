@props([
    'items',
    'center' => false,
    'end' => false,
    'vertical' => false
])

@php
    $eventName = config('administratix.views.components.carousel.events.go-to-item');
    $name = $attributes->wire('carousel')->value;   
    // if($name)
    // {
    //     preg_match_all("/<div\s+class=\"carousel-item(.*)\">\s+(.*)\s+<\/div>/", $slot, $items);
        
    //     $items = \Illuminate\Support\Arr::get($items, 0);

    //     foreach ($items as $key => $value) {
    //         $items[$key] = str_replace('<div ', "<div id='carousels.{$name}.{$key}' ", $value);
    //     };

    //     $items = new \Illuminate\Support\HtmlString(implode('', $items));
    // }
@endphp


<div {{ $attributes->merge(['class' => 'carousel'])->class(['carousel-center' => $center, 'carousel-end' => $end, 'carousel-vertical' => $vertical]) }} @if($name) x-data x-init="() => $wire.on('{{ $eventName }}-{{ $name }}', (index) => $el.children.item(index)?.scrollIntoView())" @endif>
    {{ $items ?? $slot }}
</div>