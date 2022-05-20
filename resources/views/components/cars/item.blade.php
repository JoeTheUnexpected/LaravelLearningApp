@props(['car'])
<div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
    <a class="block w-full h-40" href="{{ route('catalog.show', $car) }}"><img class="w-full h-full hover:opacity-90 object-cover"
                                               src="/images/no_image.png" alt="{{ $car->name }}"></a>
    <div class="px-6 py-4">
        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-blue-800"
                                                          href="{{ route('catalog.show', $car) }}">{{ $car->name }}</a></div>
        <p class="text-grey-darker text-base">
            <span class="inline-block">{{ number_format($car->price, 0, '', ' ') }} ₽</span>
            @if($car->old_price)
                <span class="inline-block line-through pl-6 text-gray-400">{{ number_format($car->old_price, 0, '', ' ') }} ₽</span>
            @endif
        </p>
    </div>
</div>
