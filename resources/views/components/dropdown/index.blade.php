@props([
    'trigger',
    'content'
])

@php
    $name = $attributes->wire('dropdown')->value;
@endphp


<div {{ $attributes->merge(['class' => 'dropdown']) }} @if($name) x-data="{ open: $wire.entangle('dropdowns.{{ $name }}') }" x-bind:class="{'dropdown-open': open}" @endif>
    <label tabindex="0" @if($name) x-on:click="open = true" @endif>
        {{ $trigger }}
    </label>
    <div  tabindex="0" {{ $content->attributes->merge(['class' => 'dropdown-content']) }} @if($name) x-on:click.outside="open = false" @endif>
        {{ $content }}
    </div>
</div>



@if($name)
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                if(typeof @this.get('dropdowns.{{ $name }}') === 'undefined')
                    window.alert("Declare the '{{ $name }}' key of the $dropdowns property as a boolean data type");
            });
        </script>
    @endpush
@endif