@props([
    'bordered' => true,
    'ghost' => false
])

<input {{ $attributes->merge(['class' => 'file-input w-full', 'type' => 'file'])->class(['file-input-bordered' => $bordered, 'file-input-ghost' => $ghost]) }} />