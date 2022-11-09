@props([
    'id',
    'content',
    'actions',
    'withClose' => false,
    'static' => false
])


@php
    $name = $attributes->wire('modal')->value;
    $id = $name ?? $id;
@endphp


<input type="checkbox" id="{{ $id }}" class="modal-toggle" @if($name) x-data="{ open: $wire.entangle('modals.{{ $name }}') }" x-model="open" @endif>

@if($static)
    <div class="modal">
@else
    <label for="{{ $id }}" class="modal cursor-pointer">
@endif
    <label {{ $content->attributes->merge(['class' => 'modal-box'])->class(['relative' => $static]) }} for="">
        @if($withClose)
            <label for="{{ $id }}" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
        @endif
        {{ $content }}
    </label>
    @isset($actions)
        <div class="modal-action" {{ $actions->attributes->mrge(['class' => 'modal-action']) }}>
            {{ $actions }}
        </div>
    @endisset
@if($static)
    </div>
@else
    </label>
@endif

@if($name)
    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                if(typeof @this.get('modals.{{ $name }}') === 'undefined')
                    window.alert("Declare the '{{ $name }}' key of the $modals property as a boolean data type");
            });
        </script>
    @endpush
@endif