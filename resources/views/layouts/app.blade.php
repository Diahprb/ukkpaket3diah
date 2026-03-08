<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name'))</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-100 flex flex-col-reverse items-center justify-center">
    <div class="">
        @extends('layouts.nav')
    </div>

    <div class="w-full min-h-screen flex justify-center py-10">
        @yield('content')
    </div>
    @livewireScripts
</body>
</html>
