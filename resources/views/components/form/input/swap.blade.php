@props([
    'on',
    'off',
    'rotate' => false
])

<label {{ $attributes->merge(['class' => 'swap'])->class(['swap-rotate' => $rotate])->whereDoesntStartWith('wire:model') }}>
    <input type="checkbox" {{ $attributes->whereStartsWith('wire:model') }} />
    <div class="swap-on" {{ $on->attributes->merge(['class' => 'swap-on']) }}>
        {{ $on }}
    </div>
    <div {{ $on->attributes->merge(['class' => 'swap-off']) }}>
        {{ $off }}
    </div>
</label>