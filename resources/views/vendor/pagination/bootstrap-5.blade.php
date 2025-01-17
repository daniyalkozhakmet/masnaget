@if ($paginator->hasPages())
<nav>
    <ul class="pagination">

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        @if (is_string($element))
        <li class="page-item disabled"><span class="page-link">{{ $element }}</span></li>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
        @else
        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item  border border-rounded "><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="bi bi-arrow-right" style="font-size: 15px;"></i></a></li>
        @else
        <li class="page-item disabled"><span class="page-link"><i class="bi bi-arrow-right" style="font-size: 15px;"></i></span></li>
        @endif
    </ul>
</nav>
@endif