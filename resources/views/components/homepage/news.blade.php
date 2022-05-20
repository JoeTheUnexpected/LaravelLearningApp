@props(['news'])
@if($news->isNotEmpty())
    <section class="bg-black px-6 py-4">
        <div>
            <p class="inline-block text-3xl text-white font-bold mb-4">Новости</p>
            <span class="inline-block text-gray-200 pl-1"> / <a href="{{ route('news.index') }}"
                                                                class="inline-block pl-1 text-gray-200 hover:text-blue-800"><b>Все</b></a></span>
        </div>
        <div class="grid md:grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach($news as $item)
                <div class="w-full flex">
                    <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                        <a class="block w-full h-full hover:opacity-75" href="{{ route('news.show', $item) }}"><img
                                    src="/images/no_image.png"
                                    class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                    </div>
                    <div class="px-4 flex flex-col justify-between leading-normal">
                        <div class="mb-8">
                            <div class="text-white font-bold text-xl mb-2">
                                <a class="hover:text-blue-800" href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
                            </div>
                            <p class="text-gray-300 text-base">
                                <a class="hover:text-blue-800" href="{{ route('news.show', $item) }}">{{ $item->description }}</a>
                            </p>
                        </div>
                        <div class="flex flex-col justify-end">
                            <x-tags.list :tags="$item->tags" />

                            <div class="flex items-center">
                                <p class="text-sm text-gray-400 italic">{{ \Illuminate\Support\Carbon::parse($item->published_at)->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif