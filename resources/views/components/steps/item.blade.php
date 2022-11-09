@props([
    'id',
    'active' => false.
    'dataContent',
    'content'
])

@aware([
    'classForActive' => 'step-primary',
])

<li {{ $attributes->merge(['class' => 'step', 'data-content' => $dataContent])->class([$classForActive => $active]) }}>
    {{ $content ?? $slot }}
</li>