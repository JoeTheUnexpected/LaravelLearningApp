@props(['cars'])
@if($cars->isNotEmpty())
    <section class="pb-4 px-6">
        <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
        <span class="inline-block text-gray-800 pl-1"> / <a href="{{ route('catalog.index') }}"
                                                                class="inline-block pl-1 text-gray-800 hover:text-blue-800"><b>Каталог</b></a></span>

        <x-cars.list :cars="$cars" />
    </section>
@endif
