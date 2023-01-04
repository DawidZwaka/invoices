@props([
    'type' => 'pending'
])

@php

use App\Enums\StatusTypes;

$pillTypes = [
    StatusTypes::ONGOING => 'bg-gray-300 text-gray-700',
    StatusTypes::PENDING => 'bg-orange-400 text-white',
    StatusTypes::VERIFIED => 'bg-green-300 text-white',
];

@endphp

<x-common.pill {{ $attributes->class([
    'uppercase',
    Arr::get($pillTypes, $type, $pillTypes[StatusTypes::ONGOING]),
]) }}>
    {{ $slot }}
</x-common.pill>