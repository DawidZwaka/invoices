@props([
    'curr' => 1,
    'max' => 24
])

<div>
    {{ __("Page") }} {{ $curr }} {{ __("of") }} {{ $max }}
</div>