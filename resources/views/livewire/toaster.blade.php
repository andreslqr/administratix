<div x-data="{
    toasts: $wire.entangle('toasts'),
    leaveTime: 5
}">
    @foreach($this->positions as $position => $class)
        <div class="absolute toast {{ $class }}" x-show="typeof toasts['{{ $position }}'] === 'object'">
            <template x-for="(toast, id) in toasts['{{ $position }}']" :key="id">
                <div class="alert cursor-pointer" 
                    x-on:click="delete toasts['{{ $position }}'][id]"
                    x-bind:class="toast.type"
                    x-init="
                        setTimeout(() => $el.classList.add('hidden'), toast.duration);
                        setTimeout(() => delete toasts['{{ $position }}'][id], toast.duration + leaveTime);
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
    @endforeach
 
</div>