@props([
    'tabs',
    'content',
    'items' => [],
    'bordered' => false,
    'lifted' => false,
    'boxed' => false,
    'activeTab' => false
])
@php
    $name = $attributes->wire('tabs')->value;
    $value = $name ? "\$wire.entangle('tabs.{$name}')" : "'" . \Illuminate\Support\Arr::first(array_keys($items)) . "'";
    $value = $activeTab ? "'{$activeTab}'" : $value;
@endphp

<div  x-data="{ activeTab: {{ $value }} }">
    <div {{ $attributes->merge(['class' => 'tabs'])->class(['tabs-boxed' => $boxed]) }}>
        @if($items)
            @foreach ($items as $key => $item)
                @php
                    $slotName = \Illuminate\Support\Str::of($key)->prepend('tab-')->camel()->__toString();
                @endphp
                <x-dynamic-component :component="config('administratix.views.components.tabs.tab.view')" :for="$key">
                    {{ $$slotName ?? $item }}
                </x-dynamic-component>
            @endforeach
        @else
            {{ $tabs }}
        @endif
    </div>
    <div>
        @if($items)
            @foreach ($items as $key => $item)
                @php
                    $slotName = \Illuminate\Support\Str::of($key)->prepend('content-')->camel()->__toString();
                @endphp
                <x-dynamic-component :component="config('administratix.views.components.tabs.item.view')" :for="$key">
                    {{ $$slotName }}
                </x-dynamic-component>
            @endforeach
        @else
            {{ $content }}
        @endif
    </div>
</div>

@if($name)
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                if(typeof @this.get('tabs.{{ $name }}') === 'undefined')
                    window.alert("Declare the '{{ $name }}' key of the $tabs property as a boolean data type");
            });
        </script>
    @endpush
@endif