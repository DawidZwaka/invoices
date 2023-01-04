<table {{ $attributes->class(['w-full text-sm text-left bg-white border rounded-lg shadow']) }}>
    @isset($head)
        <thead class="text-[0.7rem] uppercase text-gray-500">
            {{ $head }}
        </thead>
    @endisset    
    @isset($body)
        <tbody class="text-xs font-medium">
            {{ $body }}
        </tbody>
    @endisset
    @isset($foot)
        <tfoot class="text-[0.7rem] uppercase">
            {{ $foot }}
        </tfoot>
    @endisset
</table>