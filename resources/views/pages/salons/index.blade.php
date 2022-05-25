@extends('layouts.inner')

@section('title', 'Наши салоны')

@section('inner_content')
    <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

    <x-messages.errors :errors="$errors" />

    <x-salons.list :salons="$salons" />
@endsection
