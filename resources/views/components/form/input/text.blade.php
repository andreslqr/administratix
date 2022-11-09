@props([
    'bordered' => true,
    'ghost' => false
])

<input {{ $attributes->merge(['class' => 'input w-full', 'type' => 'text'])->class(['input-bordered' => $bordered, 'input-ghost' => $ghost]) }} />