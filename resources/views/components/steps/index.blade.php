@props([
    'vertical' => false,
    'classForActive' => 'step-primary',
    'step'
])

@php
    $name = $attributes->wire('stepper')->value;
    $markAsActive = true;
@endphp

<div @if($name) x-data="{ items: $wire.entangle('steppers.{{ $name }}'), step: $wire.entangle('step.{{ $name }}') }" @endif>

    <div {{ $attributes->merge(['class' => 'steps'])->class(['steps-vertical' => $vertical]) }}>
        @if(!$name)
            {{ $slot }}
        @else

            @foreach(\Illuminate\Support\Arr::get($this->steppers, $name, []) as $index => $item)
                <x-dynamic-component :component="config('administratix.views.components.steps.item.view')" :data-content="$index" :content="$item" x-bind:class="{ '{{ $classForActive }}': {{ $markAsActive ? 'true' : 'false' }} }" />

                @php
                    if($item == \Illuminate\Support\Arr::get($this->step, $name))
                        $markAsActive = false;
                @endphp

            @endforeach
            
        @endif
    </div>
    @if($name)
        <div>
            @foreach(\Illuminate\Support\Arr::get($this->steppers, $name, []) as $index => $item)
                @php 
                    $slotName =  \Illuminate\Support\Str::of($item)->camel(); 
                    if(!isset($$slotName))
                        throw new Exception("The slot '{$slotName}' was not defined in your stepper '{$name}'");
                        
                @endphp
                
                <div x-show="step == '{{ $item }}'" x-cloak>
                    {{ $$slotName }}
                </div>
            @endforeach
        </div>
    @endif
</div>

@if($name)
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                if(typeof @this.get('steppers.{{ $name }}') === 'undefined')
                    window.alert("Declare the '{{ $name }}' key of the $steppers property as an array data type");
                
                if(typeof @this.get('step.{{ $name }}') === 'undefined')
                    window.alert("Declare the '{{ $name }}' key of the $step property as a data type");
            });
        </script>
    @endpush
@endif