@props(['salons'])
@if($salons->isNotEmpty())
    <div class="space-y-4 max-w-4xl">
        @foreach($salons as $salon)
            <x-salons.item :salon="$salon" :isEvenLoop="$loop->even" />
        @endforeach
    </div>
@endif
