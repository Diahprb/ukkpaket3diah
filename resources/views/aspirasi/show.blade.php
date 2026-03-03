@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto my-10">
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-8">
        <h1 class="text-xl font-semibold text-gray-800 mb-4">
            {{ $aspirasi->judul }}
        </h1>

        <p class="text-xs text-gray-400 mb-2">
            Kategori: {{ $aspirasi->kategori->nama_kategori }}
        </p>

        <p class="text-sm text-gray-700 mb-4">
            {{ $aspirasi->keterangan }}
        </p>

        @if($aspirasi->feedback)
            <div class="mb-4">
                <h2 class="text-sm font-medium text-gray-800 mb-1">Feedback</h2>
                <p class="text-sm text-gray-600">{{ $aspirasi->feedback }}</p>
            </div>
        @endif

        <p class="mb-4">
            Status: <span class="font-medium">{{ ucfirst($aspirasi->status) }}</span>
        </p>

        <div class="flex gap-3">
            <a href="{{ route('aspirasi.edit', $aspirasi->id) }}"
               class="text-sm bg-yellow-100 hover:bg-yellow-200 text-yellow-700 px-4 py-2 rounded-xl transition">
                Edit
            </a>

            <form action="{{ route('aspirasi.destroy', $aspirasi->id) }}" method="POST"
                  onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="text-sm bg-red-100 hover:bg-red-200 text-red-700 px-4 py-2 rounded-xl transition">
                    Hapus
                </button>
            </form>

            <a href="{{ route('aspirasi.index') }}"
               class="bg-gray-100 hover:bg-gray-200 text-sm text-gray-500 hover:text-gray-700 transition p-2 rounded-xl flex justify-center items-center">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
