@props([
    'trigger',
    'content',
    'withArrow' => false,
    'withPlus' => false
])

@php
    $name = $attributes->wire('collapse')->value;
@endphp

<div {{ $attributes->merge(['class' => 'collapse', 'tabindex' => 0])->class(['collapse-arrow' => $withArrow, 'collapse-plus' => $withPlus]) }} @if($name) x-data="{ open: $wire.entangle('collapses.{{ $name }}') }" x-bind:class="{'collapse-open': open, 'collapse-close': ! open}" @endif>
    <div {{ $trigger->attributes->merge(['class' => 'collapse-title']) }} @if($name) x-on:click="open = !open" @endif>
        {{ $trigger }}
    </div>
    <div {{ $content->attributes->merge(['class' => 'collapse-content']) }}>
        {{ $content }}
    </div>
</div>

@if($name)
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                if(typeof @this.get('collapses.{{ $name }}') === 'undefined')
                    window.alert("Declare the '{{ $name }}' key of the $collapses property as a boolean data type");
            });
        </script>
    @endpush
@endif