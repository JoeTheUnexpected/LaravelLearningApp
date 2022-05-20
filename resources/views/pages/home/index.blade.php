@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')
    <main class="flex-1 container mx-auto bg-white">
        <x-homepage.carousel />

        <x-homepage.week_models :cars="$cars" />

        <x-homepage.news :news="$news" />
    </main>
@endsection
