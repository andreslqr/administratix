@props([
    'screen',
    'withoutCamera' => false,
    'backgroundClass' => 'bg-base-100',
    'width',
    'height',
    'content',
    'rotate' => false
])

@php
    $width = $width ?? \Illuminate\Support\Arr::get(config('administratix.views.components.mockup.phone.width'), $screen);
    $height = $height ?? \Illuminate\Support\Arr::get(config('administratix.views.components.mockup.phone.height'), $screen);

    if($rotate)
    {
        $temp = $width;
        $width = $height;
        $height = $temp;
        $withoutCamera = true;
    }
@endphp

<div class="overflow-x-auto">
    <div {{ $attributes->merge(['class' => 'mockup-phone'] )}}>
        @unless($withoutCamera)
            <div class="camera"></div> 
        @endunless
        <div {{ $content->attributes->merge(['class' => "display {$backgroundClass} overflow-y-scroll", 'style' => "width: {$width}; height: {$height};"])}}>
            {{ $content }}
        </div>
    </div>
</div>