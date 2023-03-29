@props([
    'icon',
    'content',
    'actions',
])
@php
    $name = $attributes->wire('alert')->value;
@endphp


<div {{ $attributes->merge(['class' => 'alert']) }} @if($name) x-data="{ open: $wire.entangle('alerts.{{ $name }}') }" x-show="open" x-cloak @endif>
    <div>
        @isset($icon)
            {{ $icon }}
        @endisset
        <div>
            {{ $content ?? $slot }}
        </div>
    </div>
    @isset($actions)
        <div {{ $actions->attributes->merge(['class' => 'flex-none']) }}>
            {{ $actions }}
        </div>
    @endisset

</div>



@if($name)
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                if(typeof @this.get('alerts.{{ $name }}') === 'undefined')
                    window.alert("Declare the '{{ $name }}' key of the $alerts property as a boolean data type");
            });
        </script>
    @endpush
@endif