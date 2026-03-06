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
<body class="min-h-screen bg-gray-100 flex flex-col-reverse items-center justify-center" style="background:#0B1D3A">
    @extends('layouts.nav')
    <div class="w-full py-10 px-4 ">
        @yield('content')
    </div>
    @livewireScripts
</body>
</html>
