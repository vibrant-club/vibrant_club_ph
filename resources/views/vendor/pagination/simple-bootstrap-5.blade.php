<nav role="navigation" aria-label="Pagination Navigation">
    @if ($paginator->hasPages())
        <ul class="pagination mb-2">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{!! __('pagination.previous') !!}</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">
                        {!! __('pagination.next') !!}
                    </a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link">{!! __('pagination.next') !!}</span>
                </li>
            @endif
        </ul>
    @endif

    {{-- Always show total info --}}
    <div class="text-muted small">
        Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }} total
    </div>
</nav>
