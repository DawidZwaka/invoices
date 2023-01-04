@props([
    'type' => 'pending'
])

<x-common.pill {{ $attributes->class(['statusPill--' . $type]) }}>
    {{ $slot }}
</x-common.pill>