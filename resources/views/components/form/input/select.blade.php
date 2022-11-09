@props([
    'placeholder' => __('Select'),
    'options',
    'keyName',
    'valueName',
    'bordered' => true,
    'ghost' => false,
    'withoutPlaceholder' => false,
    'formatter',
])


<select {{ $attributes->merge(['class' => 'select w-full'])->class(['select-bordered' => $bordered, 'select-ghost' => $ghost]) }}>
    @if (! $withoutPlaceholder && $placeholder)
        <option selected value="">
            {{ $placeholder }}
        </option>
    @endif
    @if(isset($options))
        @foreach($options as $key => $value)
            <option value="{{ isset($keyName) ? $value[$keyName] : $key }}">
                @if(isset($formatter))
                    {{  $formatter(isset($valueName) ? $value[$valueName] : $value) }}
                @else
                    {{  isset($valueName) ? $value[$valueName] : $value }}
                @endif
            </option>
        @endforeach
    @else
        {{ $slot }}
    @endif
</select>

