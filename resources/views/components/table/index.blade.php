<table {{ $attributes->class(['w-full text-sm text-left text-gray-500 dark:text-gray-400']) }}>
    @isset($head)
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            {{ $head }}
        </thead>
    @endisset    
    @isset($body)
        <tbody>
            {{ $body }}
        </tbody>
    @endisset
    @isset($foot)
        <tfoot class="text-xs text-gray-700 uppercase bg-gray-50">
            {{ $foot }}
        </tfoot>
    @endisset
</table>