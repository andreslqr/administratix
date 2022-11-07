@props([
    'active' => false
])

@aware([
    'hoverable' => false
])


<tr {{ $attributes->class(['hover' => $hoverable, 'active' => $active]) }}>
    {{ $slot }}
</tr>