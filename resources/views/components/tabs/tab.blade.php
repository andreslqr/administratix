@props([
    'for',
    'active' => false,
])

@aware([
    'bordered' => false,
    'lifted' => false,
])

<div {{ $attributes->merge(['class' => 'tab'])->class(['tab-bordered' => $bordered, 'tab-lifted' => $lifted, 'tab-active' => $active]) }}  x-on:click="activeTab = '{{ $for }}'" x-bind:class="{'tab-active': '{{ $for }}' == activeTab}" >
    {{ $slot }}
</div>