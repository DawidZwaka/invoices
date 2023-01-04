@props([
    'name' => 'example_name',
    'value' => 'example_value',
])

<div>
    <input
        type="radio"
        id="{{ $name . $value }}"
        name="{{ $name }}"
        value="{{ $value }}"
        required
        {{ $attributes->class(['hidden peer']) }}
    >
    <label 
        for="{{ $name . $value }}" 
        @class([
            "flex p-2 text-gray-700 rounded-lg cursor-pointer uppercase font-semibold",
            "peer-checked:text-white peer-checked:bg-gray-700",
            "hover:text-gray-600 hover:bg-gray-100"
        ])
    >                           
        {{ $slot }}
    </label>
</div>