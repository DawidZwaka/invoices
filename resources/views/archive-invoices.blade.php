@extends('layouts.app')

@section('content')
    <x-common.container class='py-20'>
        <h1>test</h1>
        <div class="flex items-center gap-5">
            @include('partials.invoices-filters')
            <x-ui.button>
                {{ __("Mark as paid") }}
            </x-ui.button>
        </div>
        @include('partials.invoices-table')
    </x-common.container>
@endsection
