@if ($paginator->hasPages())
    @php
        $buttonWrapperView = config('administratix.views.pagination.simple.button-wrapper-view');
        $buttonView = config('administratix.views.pagination.simple.button-view');
        $size = config('administratix.views.pagination.simple.size');
    @endphp
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        <span>
            @if ($paginator->onFirstPage())
                <x-dynamic-component :component="$buttonView" disabled :class="$size">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </x-dynamic-component>
            @else
                <x-dynamic-component :component="$buttonView" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" :class="$size">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </x-dynamic-component>
            @endif
        </span>
        <span>
            <x-dynamic-component :component="$buttonView" :class="$size" no-animation outline ghost>
                {{ $paginator->currentPage() }}
            </x-dynamic-component>
        </span>

        <span>
            @if ($paginator->hasMorePages())
                <x-dynamic-component :component="$buttonView" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.before" :class="$size">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </x-dynamic-component>
            @else
                <x-dynamic-component :component="$buttonView" disabled :class="$size">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </x-dynamic-component>
            @endif
        </span>
    </nav>
@endif
