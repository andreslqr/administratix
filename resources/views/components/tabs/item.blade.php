@props([
    'for'
])


<div {{ $attributes }} x-cloak x-show="'{{ $for }}' == activeTab">
    {{ $slot }}
</div>  