@props(['cars'])
@if($cars->isNotEmpty())
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
        @foreach($cars as $car)
            <x-cars.item :car="$car" />
        @endforeach
    </div>
@endif
