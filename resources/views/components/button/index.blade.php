@props([
    'color' => config('administratix.views.components.button.color'),
    'round' => config('administratix.views.components.button.round') ?: config('administratix.views.components.general.rounded')
])

<button {{ $attributes->merge([
                'class' => "border border-{$color} bg-{$color} text-white {$round} px-4 py-2 m-2 transition duration-500 ease select-none hover:opacity-80 focus:outline-none focus:shadow-outline", 
                'type' => 'button']) 
        }}>
    {{ $slot }}
</button>


