@extends('layouts.app')

@section('header')
    @parent

    {{ \Diglactic\Breadcrumbs\Breadcrumbs::render() }}
@endsection

@section('content')
    <main class="flex-1 container mx-auto bg-white flex">

        <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
            <x-panels.aside/>

            <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
                @yield('inner_content')
            </div>
        </div>

    </main>
@endsection
