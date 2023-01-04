@props([
    'curr' => 1,
    'max' => 10,
    'maxNavElemsIndex' => 7
])

<nav aria-label="Page navigation example">
  <ul class="inline-flex -space-x-px">
    @if($curr !== 1)
        <li class="flex">
          <a href="#" class="flex items-center px-1 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l hover:bg-gray-100 hover:text-gray-700">
            <span class="sr-only">Previous</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
          </a>
        </li>
    @endif
    @for($i = $curr; $i< $curr + $maxNavElemsIndex; $i++)
        @if($i > $max)
            @break;
        @endif

        <li class="flex">
            <a 
                href="#" 
                class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
            >
                {{ $i }}
            </a>
        </li>
    @endfor
    @if ($max > 6)
        <li class="flex">
          <a href="#" class="flex items-center px-1 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r hover:bg-gray-100 hover:text-gray-700">
            <span class="sr-only">Next</span>
            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
          </a>
        </li>
    @endif
  </ul>
</nav>