@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 px-4">
<div class="min-w-2xl mx-auto">

    {{-- Hero Header --}}
    <div class="rounded-2xl p-7 mb-6 relative overflow-hidden border border-sky-100 bg-[#003566]">
        <div class="absolute right-7 top-1/2 -translate-y-1/2 text-[64px] opacity-[.08] pointer-events-none select-none">✏️</div>
        <h1 class="font-extrabold text-[22px] text-white mb-1.5 tracking-tight">Edit Aspirasi ✏️</h1>
        <p class="text-[14px] text-white/60 leading-relaxed max-w-sm">
            Perbarui informasi aspirasi yang telah kamu kirimkan sebelumnya.
        </p>
    </div>

    {{-- Card Form --}}
    <div class="rounded-2xl border border-gray-200 overflow-hidden bg-white shadow-md p-7">

        {{-- Success Alert --}}
        @if(session('success'))
            <div class="flex items-center gap-3 rounded-xl px-4 py-3 mb-6 border border-emerald-200 bg-emerald-50 text-[13px] font-semibold text-emerald-600">
                <span>✅</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <form method="POST" action="{{ route('aspirasi.update', $aspirasi->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            {{-- Kategori --}}
            <div>
                <label class="block text-[12.5px] font-semibold text-slate-600 mb-2">
                    Kategori <span class="text-red-400">*</span>
                </label>
                <select name="kategori_id"
                        class="w-full rounded-xl px-4 py-2.5 text-[13.5px] border transition-all text-gray-700 bg-gray-50
                               @error('kategori_id') border-red-400 @else border-gray-200 @enderror">
                    <option value="">— Pilih kategori —</option>
                    @foreach($kategoris as $kat)
                        <option value="{{ $kat->id }}"
                                {{ old('kategori_id', $aspirasi->kategori_id) == $kat->id ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id')
                    <span class="flex items-center gap-1 text-[11.5px] text-red-500 mt-1.5">
                        <span>⚠</span> {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- Judul --}}
            <div>
                <label class="block text-[12.5px] font-semibold text-slate-600 mb-2">
                    Judul <span class="text-red-400">*</span>
                </label>
                <input type="text"
                       name="judul"
                       value="{{ old('judul', $aspirasi->judul) }}"
                       placeholder="Ringkasan singkat masalah..."
                       class="w-full rounded-xl px-4 py-2.5 text-[13.5px] border transition-all text-gray-700 bg-gray-50
                              @error('judul') border-red-400 @else border-gray-200 @enderror">
                @error('judul')
                    <span class="flex items-center gap-1 text-[11.5px] text-red-500 mt-1.5">
                        <span>⚠</span> {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- Keterangan --}}
            <div>
                <label class="block text-[12.5px] font-semibold text-slate-600 mb-2">
                    Keterangan <span class="text-red-400">*</span>
                </label>
                <textarea name="keterangan"
                          rows="5"
                          placeholder="Ceritakan detail masalah secara lengkap..."
                          class="w-full rounded-xl px-4 py-2.5 text-[13.5px] border transition-all resize-y leading-relaxed text-gray-700 bg-gray-50
                                 @error('keterangan') border-red-400 @else border-gray-200 @enderror">{{ old('keterangan', $aspirasi->keterangan) }}</textarea>
                @error('keterangan')
                    <span class="flex items-center gap-1 text-[11.5px] text-red-500 mt-1.5">
                        <span>⚠</span> {{ $message }}
                    </span>
                @enderror
            </div>

            {{-- Actions --}}
            <div class="flex gap-3 pt-1">
                <a href="{{ route('aspirasi.index') }}"
                   class="px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-gray-200 text-slate-600 hover:bg-gray-100 transition-all text-center bg-white shadow-sm">
                    ← Kembali
                </a>
                <button type="submit"
                        class="flex-1 py-2.5 rounded-xl text-[13.5px] font-bold text-white transition-all hover:opacity-90 hover:-translate-y-0.5 flex items-center justify-center gap-2"
                        style="background:linear-gradient(135deg,#1B4FD8,#0EA5E9);box-shadow:0 4px 24px rgba(27,79,216,.4)">
                    💾 Perbarui Aspirasi
                </button>
            </div>

        </form>
    </div>

</div>
</div>

<style>
    input::placeholder, textarea::placeholder { color: #94a3b8; }
    input:focus, select:focus, textarea:focus {
        outline: none;
        border-color: #38BDF8 !important;
        box-shadow: 0 0 0 3px rgba(56,189,248,.15);
    }
</style>
@endsection