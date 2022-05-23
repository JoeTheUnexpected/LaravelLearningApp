@extends('layouts.inner')

@section('title', 'Все новости')

@section('inner_content')
    <h1 class="inline text-black text-3xl font-bold mb-4">@yield('title')</h1>
    @admin(auth()->user())
        <span class="inline text-black text-3xl mb-4"> / </span> <a href="{{ route('news.create') }}" class="inline items-center text-blue-800 text-3xl hover:opacity-75">Создать новость</a>
    @endadmin

    <x-news.list :news="$news" />
@endsection
