@if($breadcrumbs->isNotEmpty())
    <nav class="container mx-auto bg-gray-100 py-1 px-4 text-sm flex items-center space-x-2">
        @foreach($breadcrumbs as $item)
            @if(!is_null($item->url) && !$loop->last)
                <a class="hover:text-blue-800" href="{{ $item->url }}">{{ $item->title }}</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-3 w-3 mx-1" fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"/>
                </svg>
            @else
                <span>{{ $item->title }}</span>
            @endif
        @endforeach
    </nav>
@endif
