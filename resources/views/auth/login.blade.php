@extends('layouts.app')

@section('content')
<div class="max-w-2xl py-30 mx-auto">

    <!-- Card -->
    <div class="bg-white shadow-xl min-w-md rounded-2xl p-8 border border-gray-100">

        <!-- Header -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">
                Login Siswa
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Silakan masuk ke akun Anda
            </p>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('auth.login') }}" class="space-y-5">
            @csrf

            <!-- NIS -->
            <div>
                <label for="nis" class="block text-sm font-medium text-gray-600 mb-1">
                    NIS
                </label>
                <input
                    id="nis"
                    type="nis"
                    name="nis"
                    value="{{ old('nis') }}"
                    required
                    autofocus
                    class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2 text-sm shadow-sm"
                >
                @error('nis')
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
                    class="w-full rounded-xl border-2 border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-2 text-sm shadow-sm"
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
                Masuk
            </button>
        </form>
    </div>

    <!-- Footer kecil -->
    <p class="text-center text-xs text-gray-400 mt-6">
        © {{ date('Y') }} {{ config('app.name') }}
    </p>

</div>
@endsection
