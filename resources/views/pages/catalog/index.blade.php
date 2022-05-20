@extends('layouts.catalog')

@section('title', 'Каталог')

@section('page_content')
    <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

    <x-cars.list :cars="$cars" />

    {{ $cars->onEachSide(1)->links('pagination.view', ['class' => 'text-center mt-4']) }}
@endsection
