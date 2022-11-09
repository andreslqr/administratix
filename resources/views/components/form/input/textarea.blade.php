@props([
    'bordered' => true,
    'ghost' => false,
])


<textarea {{ $attributes->merge(['class' => 'textarea w-full'])->class(['textarea-bordered' => $bordered, 'textarea-ghost' => $ghost]) }}>
    {{ $slot }}
</textarea>