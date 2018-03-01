@if ($paginator->hasPages())
    <div class="pagination flex-m flex-w p-t-26">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled"><span class="item-pagination flex-c-m trans-0-4">&laquo;</span></li>
            @else
                <li class="page-item"><a class="item-pagination flex-c-m trans-0-4" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="item-pagination flex-c-m trans-0-4">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a href="{{ $url }}" class="item-pagination flex-c-m trans-0-4 active-pagination">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}" class="item-pagination flex-c-m trans-0-4">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item"><a class="item-pagination flex-c-m trans-0-4" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
            @else
                <li class="page-item disabled"><span class="item-pagination flex-c-m trans-0-4">&raquo;</span></li>
            @endif
        </ul>
    </div>
@endif
