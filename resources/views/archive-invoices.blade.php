@extends('layouts.app')

@section('content')
    <x-common.container 
        class='py-20'
        x-data="invoicesTable({{ Js::from($invoices) }}, {{ Js::from($maxPage) }})"
    >
        <h1 class="text-2xl font-bold">{{ __("Invoices") }}</h1>
        <div class="flex items-center gap-5">
            @include('partials.invoices-filters')
            <x-ui.button>
                {{ __("Mark as paid") }}
            </x-ui.button>
        </div>
        @include('partials.invoices-table')
    </x-common.container>
@endsection
