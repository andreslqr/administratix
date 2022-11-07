@props([
    'title',
    'value',
    'description',
    'figure',
    'actions'
])


@aware([
    'noAutoWrap' => true
])


@unless($noAutoWrap)
    <div class="stats">
@endunless

        <div {{ $attributes->merge(['class' => 'stat']) }}>
            @isset($figure)
                <div {{ $figure->attributes->merge(['class' => 'stat-figure']) }}>
                    {{ $figure }}
                </div>
            @endisset
            @isset($title)
                <div {{ $title->attributes->merge(['class' => 'stat-title']) }}>
                    {{ $title }}
                </div>
            @endisset
            @isset($value)
                <div {{ $value->attributes->merge(['class' => 'stat-value']) }}>
                    {{ $value }}
                </div>
            @endisset
            @isset($description)
                <div {{ $description->attributes->merge(['class' => 'stat-desc']) }}>
                    {{ $description }}
                </div>
            @endisset
            
        </div>

@unless($noAutoWrap)
    </div>
@endunless
