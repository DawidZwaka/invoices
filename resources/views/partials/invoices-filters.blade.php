@php

use App\Enums\StatusTypes;

@endphp

<form 
    class="flex py-5 grow items-center gap-5 text-sm"
    x-ref="filtersForm"
>
    <div class="flex gap-2 text-xs">
        <x-form.fields.custom-radio 
            name="status" 
            value="" 
            checked
            x-on:input.debounce.700ms="onFilterChange()"
        >
            {{ __("All") }}
        </x-form.fields.custom-radio>
        <x-form.fields.custom-radio 
            name="status" 
            :value="StatusTypes::ONGOING"
            x-on:input.debounce.700ms="onFilterChange()"
        >
            {{ __(StatusTypes::ONGOING) }}
        </x-form.fields.custom-radio>
        <x-form.fields.custom-radio
            name="status" 
            :value="StatusTypes::VERIFIED"
            x-on:input.debounce.700ms="onFilterChange()"
        >
            {{ __(StatusTypes::VERIFIED) }}
        </x-form.fields.custom-radio>
        <x-form.fields.custom-radio 
            name="status" 
            :value="StatusTypes::PENDING"
            x-on:input.debounce.700ms="onFilterChange()"
        >
            {{ __(StatusTypes::PENDING) }}
        </x-form.fields.custom-radio>
    </div>

    <x-form.fields.range-datepicker 
        wrapperClasses="ml-auto"
        x-on:change.debounce.700ms="onFilterChange()"
    />

    <x-form.fields.search 
        x-on:input.debounce.700ms="onFilterChange()"
    />
</form>