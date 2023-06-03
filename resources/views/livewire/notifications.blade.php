<div class="shadow bg-base-100 rounded-box w-full backdrop-blur-sm bg-opacity-90">
    <div class="py-4 px-3 flex items-center justify-center gap-x-1" 
        wire:key="navbar-notifications-title"
    >
        <div>
            <h3 class="">
                {{ __('Notifications') }}
            </h3>
        </div>
        
        <x-dynamic-component :component="$this->swapComponent" wire:model="allNotifications" rotate>
            <x-slot:off>
                <div class="btn btn-outline btn-xs btn-circle">
                    <x-dynamic-component :component="$this->iconComponent" :name="$this->noneReadIconName">
                    </x-dynamic-component>
                </div>
            </x-slot:off>
            <x-slot:on>
                <div class="btn btn-outline btn-xs btn-circle">
                    <x-dynamic-component :component="$this->iconComponent" :name="$this->allIconName">
                    </x-dynamic-component>
                </div>
            </x-slot:on>
        </x-dynamic-component>
    </div>
    <div class="max-h-96 overflow-y-auto overscroll-contain divide-y divide-base-300">
        @forelse($this->notifications as $notification)
            @php 
                $type = Arr::get($this->notificationTypes, Arr::get($notification->data, 'type'));
                info($type);
            @endphp
            <div class="cursor-pointer py-2 px-3 flex items-center gap-x-3 {{ Arr::get($type, 'background-class') }}" 
                wire:click="readNotification('{{ $notification->getKey() }}')" 
                wire:key="navbar-notifications-{{ $notification->getKey() }}"
            >
                <div class="btn btn-outline btn-xs btn-circle {{ Arr::get($type, 'icon-class') }}">
                    <x-dynamic-component :component="$this->iconComponent" :name="Arr::get($type, 'icon')">
                    </x-dynamic-component>

                </div>
                <div>
                    <h3 class="font-bold">
                        {{ Arr::get($notification->data, 'title') }}
                    </h3>
                    <div class="text-xs">
                        {{ Arr::get($notification->data, 'content') }}
                    </div>
                </div>
            </div>
        @empty
            <div class="py-4 px-3 flex items-center justify-center gap-x-1" 
                wire:key="navbar-notifications-empty"
            >
                <div class="btn btn-outline btn-xs btn-circle">
                    <x-dynamic-component :component="$this->iconComponent" :name="$this->emptyIconName">
                    </x-dynamic-component>
                </div>
                <div>
                    <h3 class="font-bold">
                        {{ __('Without notifications') }}
                    </h3>
                </div>
            </div>
        @endforelse
    </div>
</div>