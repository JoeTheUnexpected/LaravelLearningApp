@props(['salon', 'isEvenLoop'])
<div @class([
    'w-full flex p-4',
    'flex-row-reverse bg-gray-100' => $isEvenLoop
])>
    <div class="h-48 lg:h-auto w-32 xl:w-48 flex-none text-center rounded-lg overflow-hidden">
        <img src="{{ $salon['image'] }}" class="w-full h-full object-cover" alt="">
    </div>
    <div @class([
        'px-4 flex flex-col justify-between leading-normal',
        'text-right' => $isEvenLoop
    ])>
        <div class="mb-8">
            <div class="text-black font-bold text-xl mb-2">{{ $salon['name'] }}</div>
            <div class="text-base space-y-2">
                <p class="text-gray-400">{{ $salon['addresses'][0]['country'] }}, {{ $salon['addresses'][0]['city'] }}, {{ $salon['addresses'][0]['streetName'] }}, {{ $salon['addresses'][0]['buildingNumber'] }}</p>
                <p class="text-black">{{ $salon['phone'] }}</p>
            </div>
        </div>
    </div>
</div>
