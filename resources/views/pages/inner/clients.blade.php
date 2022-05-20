@extends('layouts.inner')

@section('title', 'Для клиентов')

@section('inner_content')
    <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

    {{--  Средняя цена моделей  --}}
    @dump($cars->avg('price'))

    {{--  Средняя цена моделей, на которые действует скидка  --}}
    @dump($cars->whereNotNull('old_price')->avg('price'))

    {{--  Самая дорогая машина  --}}
    @dump($cars->sortByDesc('price')->first()->toArray())

    {{--  Коллекция, содержащая все цвета  --}}
    @dump($cars->pluck('color')->unique())

    {{--  Коллекция из названий двигателей, отсортированных по алфавиту  --}}
    @dump($cars->pluck('carEngine.name', 'carEngine.id')->unique()->sort())

    {{--  Коллекция из названий классов моделей, отсортированных по алфавиту. Ключем сделан симвоьлный код названия класса  --}}
    @dump($cars->pluck('carClass.name')->keyBy(fn($carClass) => \Illuminate\Support\Str::slug($carClass))->unique()->sort())

    {{--  Коллекция моделей, у которых есть скидка и в названии модели, двигателя или кпп есть цифра 5 или 6  --}}
    @dump($cars->whereNotNull('old_price')->filter(fn($car) => (
        \Illuminate\Support\Str::contains($car->name, ['5', '6']) ||
        \Illuminate\Support\Str::contains($car->carEngine ? $car->carEngine->name : null, ['5', '6']) ||
        \Illuminate\Support\Str::contains($car->kpp, ['5', '6']))))

    {{--  Коллекция всех типов кузовов, где ключем является название типа кузова, а значением - средняя цена машин с этим типом кузова без учета скидки. При этом не учитываются машины, для которых тип кузова не задан. --}}
    @dump($cars->whereNotNull('carBody')->groupBy('carBody.name')->transform(fn($group) => $group->avg(fn($item) => $item->old_price ?? $item->price))->sort())
@endsection
