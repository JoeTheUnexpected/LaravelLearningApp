@extends('layouts.app')

@section('header')
    @parent

    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
@endsection

@section('content')
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            @yield('page_content')
        </div>
    </main>
@endsection
