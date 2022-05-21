@props(['categories'])
@if($categories->isNotEmpty())
    <div class="border-b">
        <div class="container mx-auto block lg:flex justify-between items-center px-2 sm:px-0">
            <nav class="order-1">
                <ul class="block lg:flex">
                    @foreach($categories as $category)
                        <li class="group">
                            @if($category->children->isNotEmpty())
                                <a class="inline-block p-4 font-bold border-l border-r border-transparent group-hover:text-blue-800 group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow {{ (request()->segment(2) === $category->slug || in_array(request()->segment(2), $category->children->pluck('slug')->toArray())) ? 'text-blue-800' : 'text-black' }}"
                                   href="{{ route('catalog.category', $category) }}">
                                    {{ $category->name }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </a>

                                <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg z-40">
                                    @foreach(collect($category->children)->sortBy('sort') as $childCategory)
                                    <li>
                                        <a class="block py-2 px-4 hover:text-blue-800 hover:bg-gray-100 {{ request()->segment(2) === $childCategory->slug ? 'text-blue-800' : 'text-black' }}" href="{{ route('catalog.category', $childCategory) }}">{{ $childCategory->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            @else
                                <a class="inline-block p-4 font-bold hover:text-blue-800 {{ request()->segment(2) === $category->slug ? 'text-text-blue-800' : 'text-black' }}" href="{{ route('catalog.category', $category) }}">{{ $category->name }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
@endif