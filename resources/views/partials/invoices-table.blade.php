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
        @foreach ($invoices as $invoice)
            <x-table.row>
                @foreach ($invoice['fields'] as $field)                        
                    <x-table.cell>
                        @switch($field['type'])
                            @case(FieldTypes::TEXT)
                                {{ $field['text'] }}
                            @break
                            @case(FieldTypes::IMAGE_WITH_TEXT)
                                <div>
                                    {{ $field['text'] }}
                                </div>
                            @break
                            @case(FieldTypes::STATUS)
                                <div class="flex">
                                    <x-ui.status-pill type="{{ $field['text'] }}">
                                        {{ $field['text'] }}
                                    </x-ui.status-pill>
                                </div>
                            @break
                        @endswitch
                    </x-table.cell>
                @endforeach
            </x-table.row>
        @endforeach
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