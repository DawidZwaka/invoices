@php

use App\Enums\FieldTypes;

@endphp

<x-table>
    <x-slot name="head">
        <x-table.row>
            <x-table.cell>
                {{ __("id") }}
            </x-table.cell>
            <x-table.cell>
                {{ __("Restaurant") }}
            </x-table.cell>
            <x-table.cell>
                {{ __("Status") }}
            </x-table.cell>
            <x-table.cell>
                {{ __("Start date") }}
            </x-table.cell>
            <x-table.cell>
                {{ __("End date") }}
            </x-table.cell>
            <x-table.cell>
                {{ __("Total") }}
            </x-table.cell>
            <x-table.cell>
                {{ __("Fees") }}
            </x-table.cell>
            <x-table.cell>
                {{ __("Transfer") }}
            </x-table.cell>
            <x-table.cell>
                {{ __("Orders") }}
            </x-table.cell>
        </x-table.row>
    </x-slot>
    <x-slot name="body">
        <template x-for="item in list">
            <x-table.row>
                    <template x-for="field in item.fields">
                        <x-table.cell>
                        <template x-if="field.type === {{ Js::from(FieldTypes::TEXT) }}">
                            <div x-text="field.text"></div>
                        </template>
                        <template x-if="field.type === {{ Js::from(FieldTypes::IMAGE_WITH_TEXT) }}">
                            <div class="flex items-center">
                                <img class="rounded-full" />
                                <div x-text="field.text"></div>
                            </div>
                        </template>
                        <template x-if="field.type === {{ Js::from(FieldTypes::STATUS) }}">
                            <x-ui.status-pill x-text="field.text"/>
                        </template>
                        </x-table.cell>
                    </template>
            </x-table.row>
        </template>
    </x-slot>
    <x-slot name="foot">
        <x-table.cell colspan="100">
            <div class="w-full flex items-center justify-between">
                <x-ui.page-index/>
                <x-ui.pagination/>
            </div>
        </x-table.cell>
    </x-slot>
</x-table>