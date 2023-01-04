@php

use App\Enums\StatusTypes;

@endphp

<form class="flex py-5 grow items-center gap-5 text-sm">
    <div class="flex gap-2 text-xs">
        <x-form.fields.custom-radio name="status" value="" checked>
            {{ __("All") }}
        </x-form.fields.custom-radio>
        <x-form.fields.custom-radio name="status" :value="StatusTypes::ONGOING">
            {{ __(StatusTypes::ONGOING) }}
        </x-form.fields.custom-radio>
        <x-form.fields.custom-radio name="status" :value="StatusTypes::VERIFIED">
            {{ __(StatusTypes::VERIFIED) }}
        </x-form.fields.custom-radio>
        <x-form.fields.custom-radio name="status" :value="StatusTypes::PENDING">
            {{ __(StatusTypes::PENDING) }}
        </x-form.fields.custom-radio>
    </div>

    <x-form.fields.range-datepicker class="ml-auto"/>

    <x-form.fields.search />
</form>