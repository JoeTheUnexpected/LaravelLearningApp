@extends('layouts.inner')

@section('title', $news->title)

@section('inner_content')
    <h1 class="inline text-black text-3xl font-bold mb-4">{{ $news->title }}</h1>
    <span class="inline text-black text-3xl mb-4"> / </span> <a href="{{ route('news.edit', $news) }}" class="inline items-center text-blue-800 text-3xl hover:opacity-75">Редактировать новость</a>

    <div class="space-y-4">

        <img src="/images/no_image.png" alt="" title="">

        <x-tags.list :tags="$news->tags" />

        <p>{!! $news->body !!}</p>
    </div>

    <div class="mt-4">
        <a class="inline-flex items-center text-blue-800 hover:opacity-75" href="{{ route('news.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
            </svg>
            К списку новостей
        </a>
    </div>
@endsection
