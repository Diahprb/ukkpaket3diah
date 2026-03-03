@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">

    <!-- Card -->
    <div class="bg-white shadow-xl rounded-2xl p-8 border border-gray-100">

        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Daftar Akun
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Buat akun baru untuk mulai menggunakan SIAP
            </p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
            @csrf

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600 mb-1">
                    Nama Lengkap
                </label>
                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autofocus
                    class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2 text-sm shadow-sm"
                    placeholder="Masukkan nama lengkap"
                >
                @error('name')
                    <span class="text-red-500 text-xs mt-1 block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Kelas -->
            <div>
                <label for="kelas" class="block text-sm font-medium text-gray-600 mb-1">
                    Kelas
                </label>
                <input
                    id="kelas"
                    type="text"
                    name="kelas"
                    value="{{ old('kelas') }}"
                    required
                    class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2 text-sm shadow-sm"
                    placeholder="Contoh: XI IPA 2"
                >
                @error('kelas')
                    <span class="text-red-500 text-xs mt-1 block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600 mb-1">
                    Email
                </label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2 text-sm shadow-sm"
                    placeholder="contoh@email.com"
                >
                @error('email')
                    <span class="text-red-500 text-xs mt-1 block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600 mb-1">
                    Password
                </label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="w-full rounded-xl border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2 text-sm shadow-sm"
                    placeholder="Minimal 8 karakter"
                >
                @error('password')
                    <span class="text-red-500 text-xs mt-1 block">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Button -->
            <button
                type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 transition text-white text-sm font-medium py-2.5 rounded-xl shadow-md"
            >
                Daftar
            </button>
        </form>

        <!-- Link ke Login -->
        <p class="text-center text-sm text-gray-500 mt-5">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:underline font-medium">
                Masuk di sini
            </a>
        </p>

    </div>

    <!-- Footer kecil -->
    <p class="text-center text-xs text-gray-400 mt-6">
        © {{ date('Y') }} {{ config('app.name') }}
    </p>

</div>
@endsection
