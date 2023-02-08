@props([
    'content',
    'topImage',
    'bottomImage',
    'actions',
    'compact' => false,
    'imageOnSide' => false,
    'glass' => false,
    'fullImage' => false
])


<div {{ $attributes->merge(['class' => 'card'])->class(['card-side' => $imageOnSide, 'glass' => $glass, 'card-compact' => $compact, 'image-full' => $fullImage]) }}>
    @isset($topImage)
        <figure {{ $topImage->attributes }}>
            {{ $topImage }}    
        </figure>
    @endisset
    <div class="card-body">
        {{ $content ?? $slot }}
        @isset($actions)
            <div {{ $actions->attributes->merge(['class' => 'card-actions']) }}>
                {{ $actions }}
            </div>
        @endisset
    </div>
    @isset($bottomImage)
        <figure {{ $bottomImage->attributes }}>
            {{ $bottomImage }}
        </figure>
    @endisset
</div>