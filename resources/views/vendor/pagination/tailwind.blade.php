@if ($paginator->hasPages())
    <div class="d-flex justify-content-center mt-4">
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center space-x-1">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="px-4 py-2 text-sm bg-gray-200 text-gray-400 rounded-pill">
                    &laquo; Previous
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="px-4 py-2 text-sm bg-vibrant text-white rounded-pill hover:bg-vibrant-dark transition">
                    &laquo; Previous
                </a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-3 py-2 text-sm text-gray-500">...</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-4 py-2 text-sm bg-vibrant text-white rounded-pill">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="px-4 py-2 text-sm text-vibrant border border-vibrant rounded-pill hover:bg-vibrant hover:text-white transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="px-4 py-2 text-sm bg-vibrant text-white rounded-pill hover:bg-vibrant-dark transition">
                    Next &raquo;
                </a>
            @else
                <span class="px-4 py-2 text-sm bg-gray-200 text-gray-400 rounded-pill">
                    Next &raquo;
                </span>
            @endif
        </nav>
    </div>
@endif
