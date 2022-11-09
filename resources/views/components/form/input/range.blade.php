@props([
    'min',
    'max',
    'step' => 1,
    'withSteps' => false
])

<input {{ $attributes->merge(['class' => 'range', 'type' => 'range', 'min' => $min ?? false, 'max' => $max ?? false, 'step' => $step ?? false]) }} />
@if($withSteps)
    <div class="w-full flex justify-between text-xs px-2">
        @foreach (range(0, ($max - $min) / $step) as $item)
            <span>
                |
            </span>
        @endforeach
    </div>
@endif