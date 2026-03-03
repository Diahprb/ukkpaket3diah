@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto my-10">

    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">

        <h1 class="text-xl font-semibold text-gray-800 mb-6">
            Edit Aspirasi
        </h1>

        @if(session('success'))
            <div class="bg-green-50 text-green-700 text-sm px-4 py-2 rounded-xl mb-5 border border-green-100">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('aspirasi.update', $aspirasi->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Kategori -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Kategori
                </label>
                <select name="kategori_id"
                        class="w-full rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 text-sm px-4 py-2">
                    <option value=""> Pilih kategori </option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}"
                            {{ old('kategori_id', $aspirasi->kategori_id) == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Judul -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Judul
                </label>
                <input type="text"
                       name="judul"
                       value="{{ old('judul', $aspirasi->judul) }}"
                       class="w-full rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 text-sm px-4 py-2">
                @error('judul')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Keterangan -->
            <div>
                <label class="block text-sm font-medium text-gray-600 mb-1">
                    Keterangan
                </label>
                <textarea name="keterangan"
                          rows="4"
                          class="w-full rounded-xl border border-gray-200 focus:border-indigo-500 focus:ring focus:ring-indigo-200 text-sm px-4 py-2">{{ old('keterangan', $aspirasi->keterangan) }}</textarea>
                @error('keterangan')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- Button -->
            <button
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium py-2.5 rounded-xl shadow-sm transition">
                Perbarui Aspirasi
            </button>
        </form>

    </div>
</div>
@endsection
