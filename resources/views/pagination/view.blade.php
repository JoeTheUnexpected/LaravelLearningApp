@if ($paginator->hasPages())
    <div class="{{ $class }}">
        <nav aria-label="Pagination" class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px text-lg">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span
                    class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            @endif

            @php
                $start = $paginator->currentPage() - $paginator->onEachSide;
                $end = $paginator->currentPage() + $paginator->onEachSide;
                if ($end > $paginator->lastPage()) {
                    $start += ($paginator->lastPage() - $end);
                    $end = $paginator->lastPage();
                }
                if ($start < 1) {
                    $end -= ($start - 1);
                    $start = 1;
                }
                if ($end > $paginator->lastPage()) {
                    $end = $paginator->lastPage();
                }
            @endphp

            @if ($start > 1)
                <a class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white" href="{{ $paginator->url(1) }}">{{1}}</a>
                @if ($start == 3)
                    <a class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white" href="{{ $paginator->url(2) }}">{{2}}</a>
                @elseif ($start >= $paginator->onEachSide + 1 && $start > 2)
                    {{-- "Three Dots" Separator --}}
                    <a class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white" href="{{ $paginator->url(ceil(($start - 1) / 2)) }}">...</a>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $paginator->currentPage())
                    <span class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white bg-gray-800 text-gray-300">{{ $i }}</span>
                @else
                    <a class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white" href="{{ $paginator->url($i) }}">{{$i}}</a>
                @endif
            @endfor

            @if($end < $paginator->lastPage())
                @if ($end == $paginator->lastPage() - 2)
                    <a class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white" href="{{ $paginator->url($paginator->lastPage() - 1) }}">{{ $paginator->lastPage() - 1 }}</a>
                @elseif ($end <= $paginator->lastPage() - $paginator->onEachSide && $end < $paginator->lastPage() - 1)
                    {{-- "Three Dots" Separator --}}
                    <a class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white" href="{{ $paginator->url(floor(($paginator->lastPage() + $end) / 2)) }}">...</a>
                @endif
                <a class="inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-gray-700 hover:bg-gray-800 hover:text-white" href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-500 hover:bg-gray-800 hover:text-white">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              clip-rule="evenodd"/>
                    </svg>
                </a>
            @else
                <span
                    class="inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-gray-200 cursor-not-allowed">
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                 fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </span>
            @endif
        </nav>
    </div>
@endif
