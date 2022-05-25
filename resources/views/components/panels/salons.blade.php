<div class="flex-1">
    @if($salons->isNotEmpty())
        <div>
            <p class="inline-block text-3xl text-black font-bold mb-4">Наши салоны</p>
            <span class="inline-block pl-1"> / <a href="{{ route('salons.index') }}"
                                                  class="inline-block pl-1 text-gray-600 hover:text-orange"><b>Все</b></a></span>
        </div>

        <div class="grid gap-6 grid-cols-1 lg:grid-cols-2">
            @foreach($salons as $salon)
                <x-salons.item :salon="$salon" :isEvenLoop="false" />
            @endforeach
        </div>
    @endif
</div>

