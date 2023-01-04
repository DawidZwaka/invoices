@extends('layouts.app')

@section('content')
    <h1>{{ $title }}</h1>
    <div class="flex">
        @include('partials.invoices-filters')
    </div>
    @include('partials.invoices-table')
@endsection
