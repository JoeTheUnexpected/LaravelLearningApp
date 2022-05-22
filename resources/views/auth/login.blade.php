@extends('layouts.inner')

@section('title', 'Авторизация')

@section('content')
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

            <x-messages.errors />

            <form method="post" action="{{ route('login') }}">
                @csrf

                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <x-auth.login_formfields />

                        <div class="block">
                            <x-buttons.button color="blue-800" label="Войти" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
