<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

    <title>The company - @yield('title')</title>
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col pb-10">
<div class="wrapper flex flex-1 flex-col">
    <x-panels.header />

    @yield('content')

    <x-panels.footer />
</div>

<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
</body>
</html>
