@php

use App\Enums\FieldTypes;

@endphp

<x-table>
    <x-slot name="head">
        gyuguguy
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
                                <x-ui.status-pill type="{{ $field['text'] }}">
                                    {{ $field['text'] }}
                                </x-ui.status-pill>
                            @break
                        @endswitch
                    </x-table.cell>
                @endforeach
            </x-table.row>
        @endforeach
    </x-slot>
    <x-slot name="foot">
        <x-table.cell>
            <x-ui.page-index/>
        </x-table.cell>
        <x-table.cell>
            <x-ui.pagination/>
        </x-table.cell>
    </x-slot>
</x-table>