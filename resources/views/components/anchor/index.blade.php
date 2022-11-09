@props([
    'content',
    'onHover' => false
])


<a {{ $attributes->merge(['class' => 'link'])->class(['link-hover' => $onHover]) }}>    
    {{ $content ?? $slot }}
</a>