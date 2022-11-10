@props([

])

<div class="tooltip tooltip-info tooltip-left" data-tip="{{ $slot }}">
    <div {{ $attributes->merge(['class' => "btn btn-xs btn-circle btn-info cursor-help"]) }}>
        ?
    </div>
</div>