<div x-data="{
    toasts: $wire.entangle('toasts'),
    positions: $wire.entangle('positions'),
    types: $wire.entangle('types')
}">
    @foreach($this->positions as $position => $class)
        @if($this->toasts[$position])
            <div class="{{ $class }}">
                <template x-for="toast in toasts['{{ $position }}']">
                    <div class="alert" x-bind:class="toast.type" >
                        <div>
                            <span x-html="toast.icon">
                            </span>
                            <span x-html="toast.content">
                            </span>
                        </div>
                    </div>
                </template>
            </div>
        @endif
    @endforeach
 
</div>