<button 
    type="button"
    {{ $attributes->class([
        'text-white bg-orange-500 font-medium rounded text-sm px-5 py-2.5',
        'focus:ring-4 focus:ring-orange-600 focus:outline-none',
        'hover:bg-orange-600'
        ]) }}
>
    {{ $slot }}
</button> 

