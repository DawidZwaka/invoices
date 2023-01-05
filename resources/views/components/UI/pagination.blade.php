<nav 
    aria-label="Page navigation example" 
    x-data="{maxElems: 7,
     min: 1,
     active: 1,
     }"
    x-init="$watch('maxPage', () => {
        min = 1;
        active = 1;
    })"
    x-show="maxPage > 1"
>
  <ul class="inline-flex -space-x-px">
    <li 
        class="flex"
        x-show="activePage !== 1"
    >
      <a 
        class="flex items-center px-1 ml-0 leading-tight cursor-pointer text-gray-500 border border-gray-300 rounded-l hover:bg-gray-100 hover:text-gray-700"
        x-on:click="() => {
                if(min > 1)
                    --min;
                onPaginationClick(activePage - 1);
            }"
        >
        <span class="sr-only">Previous</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
      </a>
    </li>
        <template x-for="i in Array.from({length: maxElems > maxPage? maxPage : maxElems}, (_, i) => i + min)">

            <li class="flex">
                <a 
                    x-on:click="() => {
                        active = i;
                        onPaginationClick(i);
                        console.log(activePage, i);
                    }"
                    class="px-3 py-2 leading-tight w-[2rem] text-gray-500 cursor-pointer border border-gray-300 hover:bg-gray-100 hover:text-gray-700"
                    x-text="i"
                    x-bind:class="activePage === i? 'bg-gray-400 text-gray-900': ''"
                >
                </a>
            </li>
        </template>
    <li 
        class="flex"
        x-show="activePage < maxPage"
        >
      <a 
        class="flex items-center px-1 leading-tight text-gray-500 cursor-pointer border border-gray-300 rounded-r hover:bg-gray-100 hover:text-gray-700"
        x-on:click="() => {
                if(min + maxElems <= maxPage)
                    ++min;
                onPaginationClick(activePage + 1);
            }"
        >
        <span class="sr-only">Next</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
      </a>
    </li>
  </ul>
</nav>