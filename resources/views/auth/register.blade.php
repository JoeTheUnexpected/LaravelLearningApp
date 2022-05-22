@extends('layouts.inner')

@section('title', 'Регистрация')

@section('content')
    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">@yield('title')</h1>

            <x-messages.errorы />

            <form method="post" action="{{ route('register') }}">
                @csrf

                <div class="mt-8 max-w-md">
                    <div class="grid grid-cols-1 gap-6">
                        <x-auth.register_formfields />

                        <div class="block">
                            <x-buttons.button color="blue-800" label="Зарегистрироваться" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
