<div x-data="{
    toasts: $wire.entangle('toasts'),
    positions: $wire.entangle('positions'),
    types: $wire.entangle('types'),
    enterTime: 5,
    leaveTime: 5
}">
    @foreach($this->positions as $position => $class)
        @if($this->toasts[$position])
            <div class="absolute toast {{ $class }}">
                <template x-for="(toast, id) in toasts['{{ $position }}']" x-bind:key="id">
                    <div class="alert hidden" 
                        x-bind:class="toast.type" 
                        x-bind:id="id" 
                        x-init="
                            setTimeout(() => $el.classList.remove('hidden'), enterTime);
                            {{-- setTimeout(() => $el.classList.add('hidden'), enterTime + toast.duration);
                            setTimeout(() => delete toasts['{{ $position }}'][id], enterTime + toast.duration + leaveTime); --}}
                        "
                    >
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