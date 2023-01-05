@php

use App\Enums\StatusTypes;

@endphp

<x-common.pill 
    class="uppercase"
    x-bind:class="() => {
            let res = '';

            switch(field.text) {
                case '{{ StatusTypes::ONGOING }}': {
                    res = 'bg-gray-300 text-gray-700';
                    break;
                };
                case '{{ StatusTypes::PENDING }}': {
                    res = 'bg-orange-400 text-white';
                    break;
                };
                case '{{ StatusTypes::VERIFIED }}': {
                    res = 'bg-green-300 text-white';
                    break;
                };
            }

            return res;
        }
    "
    {{ $attributes->merge(['']) }}
>
    {{ $slot }}
</x-common.pill>