@props([
    'content',
    'loading' => false,
    'ghost' => false,
    'asLink' => false,
    'noAnimation' => false,
    'active' => false,
    'outline' => false,
    'wide' => false,
    'glass' => false,
    'disabled' => false,
    'square' => false,
    'circle' => false,
    'block' => false,
    'textLoading' => null,
])

<button {{ $attributes->merge([
                            'class' => 'btn',
                            'disabled' => $disabled
                        ])->class([
                            'btn-ghost' => $ghost,
                            'btn-link' => $asLink,
                            'btn-active' => $active,
                            'btn-outline' => $outline, 
                            'btn-wide' => $wide,
                            'btn-square' => $square,
                            'btn-circle' => $circle,
                            'btn-block' => $block,
                            'glass' => $glass,
                            'loading' => $loading,
                            'no-animation' => $noAnimation
                        ]) }}
>
{{ $loading ? ($textLoading) : ($content ?? $slot) }}
</button>