@props([
    'name' => 'example_name',
    'value' => 'example_value'
])

<input 
    id="{{ $name . $value }}" 
    type="checkbox" 
    name="{{ $name }}"
    value="{{ $value }}" 
    @class([
        "w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded",
        "focus:ring-blue-500 focus:ring-"
    ])
    {{ $attributes->merge(['']) }}
>