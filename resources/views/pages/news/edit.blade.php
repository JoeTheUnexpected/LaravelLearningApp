@extends('layouts.inner')

@section('title', 'Редактирование новости')

@section('inner_content')
    <h1 class="inline text-black text-3xl font-bold mb-4">@yield('title')</h1>
    @admin(auth()->user())
        <span class="inline text-black text-3xl mb-4"> / </span> <a href="{{ route('news.show', $news) }}" class="inline items-center text-blue-800 text-3xl hover:opacity-75">К просмотру новости</a>
    @endadmin

    <x-messages.success/>
    <x-messages.errors/>

    <form action="{{ route('news.update', $news) }}" method="post">
        @csrf
        @method('patch')

        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <x-news.formfields :news="$news"/>

                <div class="block">
                    <x-buttons.button color="blue-800" label="Редактировать"/>
                </div>
            </div>
        </div>
    </form>

    <form action="{{ route('news.destroy', $news) }}" method="post">
        @csrf
        @method('delete')

        <div class="mt-8 max-w-md">
            <div class="grid grid-cols-1 gap-6">
                <div class="block">
                    <x-buttons.button color="red-800" label="Удалить"/>
                </div>
            </div>
        </div>
    </form>
@endsection
