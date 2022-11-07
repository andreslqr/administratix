@props([
    'rounded' => false
])

@php
    $name = $attributes->wire('carousel')->value;   
    
    if($name)
    {
        preg_match_all("/<div\s+class=\"carousel-item(.*)\">\s+(.*)\s+<\/div>/", $slot, $items);
        
    }
@endphp


<div {{ $attributes->merge(['class' => 'carousel'])->class(['rounded-box' => $rounded]) }}>
    {{ $slot }}
</div>