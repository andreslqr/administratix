@props([
    'striped' => false,
    'compact' => false,
    'hoverable' => false,
    'header',
    'body',
    'footer'
])


<div class="overflow-x-auto">
    <table {{ $attributes->merge(['class' => 'table'])->class(['table-compact' => $compact, 'table-zebra' => $striped]) }}>
        @isset($header)
            <thead {{ $header->attributes }}>
                {{ $header }}
            </thead>
        @endisset
        @isset($body)
            <tbody {{ $body->attributes }}>
                {{ $body }}
            </tbody>
        @endisset
        @isset($footer)
            <tfoot {{ $footer->attributes }}>
                {{ $footer }}
            </tfoot>
        @endisset   
    </table>

</div>