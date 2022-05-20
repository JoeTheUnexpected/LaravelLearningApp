@props(['item'])
<div class="w-full flex">
    <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
        <a class="block w-full h-full hover:opacity-75" href="{{ route('news.show', $item) }}"><img src="/images/no_image.png"
                                                                           class="bg-white bg-opacity-25 w-full h-full object-contain"
                                                                           alt=""></a>
    </div>
    <div class="px-4 leading-normal">
        <div class="mb-8 space-y-2">
            <div class="text-black font-bold text-xl">
                <a class="hover:text-blue-800" href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
            </div>
            <p class="text-gray-600 text-base">
                <a class="hover:text-blue-800" href="{{ route('news.show', $item) }}">{{ $item->description }}</a>
            </p>

            <x-tags.list :tags="$item->tags" />

            <div class="flex items-center">
                <p class="text-sm text-gray-600 italic">{{ \Illuminate\Support\Carbon::parse($item->published_at)->format('d M Y') }}</p>
            </div>
        </div>
    </div>
</div>
