@php

use App\Enums\StatusTypes;

@endphp

<form class="flex">
    <div class="flex gap-5">
        <x-form.fields.custom-radio name="status" value="">
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

    <x-form.fields.range-datepicker/>

    <x-form.fields.search />
</form>