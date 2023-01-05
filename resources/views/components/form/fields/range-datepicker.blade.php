@props([
    'wrapperClasses' => ''
])

<div 
    date-rangepicker  
    datepicker-format="dd/mm/yyyy"       
    @class([
        'flex items-center',
        $wrapperClasses
    ])
>
  <div class="flex bg-white border border-gray-300 text-gray-900 text-sm rounded-lg shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500">
    <div class="flex items-center relative bg-gray-200">
        <div class="flex items-center pl-3 pointer-events-none">
            <x-icon.calendar />
        </div>
        <span class="mx-4 text-gray-500">{{ __("From") }}</span>
    </div>
    <input 
        name="start" 
        type="text" 
        class="border-0 w-[7rem] bg-transparent focus:outline-0"
        placeholder="Start date"
        {{ $attributes->merge(['']) }}
    >

    <x-icon.arrow-right class="self-center" />
    <input 
        name="end" 
        type="text"        
        class="border-0 w-[7rem] bg-transparent focus:outline-0"
        placeholder="End date"
        {{ $attributes->merge(['']) }}
    >
  </div>
</div>