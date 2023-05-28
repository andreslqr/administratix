@props([
    'tooltipComponent' => config('administratix.views.components.tooltip.view')
])

<x-dynamic-component :component="$tooltipComponent" class="tooltip-info tooltip-left" :content="$slot">
    <div {{ $attributes->merge(['class' => "btn btn-xs btn-circle btn-info cursor-help"]) }}>
        ?
    </div>
</x-dynamic-component>