@extends('layouts.inner')

@section('title', 'Создание новости')

@section('inner_content')
    <h1 class="inline text-black text-3xl font-bold mb-4">@yield('title')</h1>
    <span class="inline text-black text-3xl mb-4"> / </span> <a href="{{ route('news.index') }}" class="inline items-center text-blue-800 text-3xl hover:opacity-75">К списку новостей</a>

    <x-messages.success />
    <x-messages.errors />

    <form action="{{ route('news.store') }}" method="post">
        @csrf

        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-news.formfields :news="new \App\Models\News" />

                <div class="block">
                    <x-buttons.button color="blue-800" label="Создать" />
                </div>
            </div>
        </div>
    </form>
@endsection
