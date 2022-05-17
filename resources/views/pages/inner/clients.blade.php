@extends('layouts.inner')

@section('title', 'Для клиентов')

@section('inner_content')
    <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

    <x-panels.lorem />
@endsection
