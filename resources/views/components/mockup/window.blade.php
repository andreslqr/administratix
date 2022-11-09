@props([
    'screen',
    'width',
    'height',
    'content',
    'rotate' => false
])

@php
    $width = $width ?? \Illuminate\Support\Arr::get(config('administratix.views.components.mockup.window.width'), $screen);
    $height = $height ?? \Illuminate\Support\Arr::get(config('administratix.views.components.mockup.window.height'), $screen);

    if($rotate)
    {
        $temp = $width;
        $width = $height;
        $height = $temp;
    }
@endphp

<div class="overflow-x-auto">
    <div {{ $attributes->merge(['class' => 'mockup-window border'] )}}>
        <div {{ $content->attributes->merge(['class' => 'overflow-y-scroll', 'style' => "width: {$width}; height: {$height};"])}}>
            {{ $content }}
        </div>
    </div>
</div>