@props([
    'for'
])


<div {{ $attributes }} x-show="'{{ $for }}' == activeTab">
    {{ $slot }}
</div>  