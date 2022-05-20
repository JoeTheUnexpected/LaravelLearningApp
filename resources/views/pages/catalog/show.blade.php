@extends('layouts.catalog')

@section('title', $car->name)

@section('page_content')
    <h1 class="text-black text-3xl font-bold mb-4">{{ $car->name }}</h1>

    <div class="flex-1 grid grid-cols-1 lg:grid-cols-5 border-b w-full">
        <div class="col-span-3 border-r-0 sm:border-r pb-4 px-4 text-center">
            <div class="mb-4 border rounded">
                <img class="w-full" src="/images/no_image.png" alt="{{ $car->name }}">
            </div>
        </div>
        <div class="col-span-1 lg:col-span-2">
            <div class="space-y-4 w-full">
                <div class="block px-4">
                    @if($car->old_price)
                        <p class="text-base line-through text-gray-400">{{ number_format($car->old_price, 0, '', ' ') }}
                            ₽</p>
                    @endif
                    <p class="font-bold text-2xl text-blue-800">{{ number_format($car->price, 0, '', ' ') }} ₽</p>
                </div>

                <div id="accordion-collapse" data-accordion="open">
                    <div class="block border-t clear-both w-full">
                        <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer"
                             data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                             aria-controls="accordion-collapse-body-1">
                            <span>Параметры</span>
                            <svg data-accordion-icon class="w-6 h-6 rotate-180 shrink-0 text-blue-800"
                                 fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div id="accordion-collapse-body-1" class="my-4 px-4"
                             aria-labelledby="accordion-collapse-heading-1">
                            <table class="w-full">
                                <x-cars.tr label="Салон" :value="$car->salon"/>

                                <x-cars.tr label="Класс" :value="$car->carClass ? $car->carClass->name : null"/>

                                <x-cars.tr label="КПП" :value="$car->kpp"/>

                                <x-cars.tr label="Год выпуска" :value="$car->year"/>

                                <x-cars.tr label="Цвет" :value="$car->color"/>

                                <x-cars.tr label="Кузов" :value="$car->carBody ? $car->carBody->name : null"/>

                                <x-cars.tr label="Двигатель" :value="$car->carEngine ? $car->carEngine->name : null"/>
                            </table>
                        </div>
                    </div>

                    <div class="block border-t clear-both w-full">
                        <div class="text-black text-2xl font-bold flex items-center justify-between hover:bg-gray-50 p-4 cursor-pointer"
                             data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                             aria-controls="accordion-collapse-body-2">
                            <span>Описание</span>
                            <svg data-accordion-icon class="w-6 h-6 shrink-0 text-blue-800"
                                 fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <div id="accordion-collapse-body-2" class="my-4 px-4 hidden"
                             aria-labelledby="accordion-collapse-heading-2">
                            {!! $car->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
