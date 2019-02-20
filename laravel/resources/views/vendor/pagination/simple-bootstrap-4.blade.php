@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><span class="page-link">@lang('pagination.previous')</span></li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="color:#D9A405;">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" style="color:#D9A405;">@lang('pagination.next')</a></li>
        @else
            <li class="page-item disabled"><span class="page-link">@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
