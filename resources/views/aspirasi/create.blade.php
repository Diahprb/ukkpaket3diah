@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 px-4">

    <div class="min-w-3xl mx-auto">

        {{-- Hero Header --}}
        <div class="rounded-2xl p-7 mb-6 relative overflow-hidden border border-sky-400/20 bg-black"
            >
            <div class="absolute right-7 top-1/2 -translate-y-1/2 text-[64px] opacity-[.12] pointer-events-none select-none">
                📣
            </div>
            <h1 class="font-extrabold text-[22px] text-white mb-1.5 tracking-tight">
                Buat Aspirasi Baru 📣
            </h1>
            <p class="text-[14px] text-white/60 leading-relaxed max-w-sm">
                Sampaikan pengaduan atau masukan. Setiap laporan akan ditangani pihak berwenang.
            </p>
        </div>

        {{-- Card Form --}}
        <div class="rounded-2xl p-7 border border-white/[.07] bg-white shadow-md">

            {{-- Success Alert --}}
            @if(session('success'))
                <div class="flex items-center gap-3 rounded-xl px-4 py-3 mb-6 border border-emerald-500/25 text-[13px] font-semibold text-emerald-400"
                     style="background:rgba(16,185,129,.08)">
                    <span>✅</span>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('aspirasi.store') }}" class="space-y-5"  enctype="multipart/form-data">
                @csrf

                {{-- Kategori --}}
                <div>
                    <label class="block text-[12.5px] font-semibold text-slate-700 mb-2">
                        Kategori <span class="text-red-400">*</span>
                    </label>
                    <select name="kategori_id"
                            class="w-full rounded-xl px-4 py-2.5 text-[13.5px] border shadow transition-all
                                   @error('kategori_id') border-red-500/60 @else border-white/10 @enderror"
                            style="background:rgba(255,255,255,.06);color:white">
                        <option value="" style="background:#0f2240">— Pilih kategori —</option>
                        @foreach($kategoris as $kat)
                            <option value="{{ $kat->id }}"
                                    style="background:#0f2240"
                                    {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>
                                {{ $kat->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori_id')
                        <span class="flex items-center gap-1 text-[11.5px] text-red-400 mt-1.5">
                            <span>⚠</span> {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- Judul --}}
                <div>
                    <label class="block text-[12.5px] font-semibold text-slate-700 mb-2">
                        Judul <span class="text-red-400">*</span>
                    </label>
                    <input type="text"
                           name="judul"
                           value="{{ old('judul') }}"
                           placeholder="Ringkasan singkat masalah..."
                           class="w-full rounded-xl px-4 py-2.5 shadow text-[13.5px] border transition-all
                                  @error('judul') border-red-500/60 @else border-white/10 @enderror"
                           style="background:rgba(255,255,255,.06);color:white;outline:none">
                    @error('judul')
                        <span class="flex items-center gap-1 text-[11.5px] text-red-400 mt-1.5">
                            <span>⚠</span> {{ $message }}
                        </span>
                    @enderror
                </div>

                {{-- Keterangan --}}
                <div>
                    <label class="block text-[12.5px] font-semibold text-slate-700 mb-2">
                        Keterangan <span class="text-red-400">*</span>
                    </label>
                    <textarea name="keterangan"
                              rows="5"
                              placeholder="Ceritakan detail masalah secara lengkap..."
                              class="w-full rounded-xl px-4 shadow py-2.5 text-[13.5px] border transition-all resize-y leading-relaxed
                                     @error('keterangan') border-red-500/60 @else border-white/10 @enderror"
                              style="background:rgba(255,255,255,.06);color:white;outline:none">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                        <span class="flex items-center gap-1 text-[11.5px] text-red-400 mt-1.5">
                            <span>⚠</span> {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="bg-gray-50 p-6 rounded bg-white shadow">
                    <label class="block text-[12.5px] font-semibold text-slate-700 mb-2">
                        Bukti Laporan (berupa Foto) <span class="text-red-400">*</span>
                    </label>
                   <input
                        id="file-upload"
                        name="bukti_lapor"
                        type="file"
                        class="block w-full text-sm text-gray-500
                        file:mr-4 file:py-2 file:px-4
                        file:rounded-full file:border-0
                        file:text-sm file:font-semibold
                        file:bg-indigo-50 file:text-indigo-600
                        hover:file:bg-indigo-100"
                    />
                    @error('keterangan')
                        <span class="flex items-center gap-1 text-[11.5px] text-red-400 mt-1.5">
                            <span>⚠</span> {{ $message }}
                        </span>
                    @enderror
                </div>



                {{-- Actions --}}
                <div class="flex gap-3 pt-1">
                    <a href="{{ route('aspirasi.index') }}"
                       class="px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-white/10 text-slate-600 hover:bg-white/10 transition-all text-center"
                       style="background:rgba(255,255,255,.06)">
                        ← Kembali
                    </a>
                    <button type="submit"
                            class="flex-1 py-2.5 rounded-xl text-[13.5px] font-bold text-white transition-all hover:opacity-90 hover:-translate-y-0.5 flex items-center justify-center gap-2"
                            style="background:linear-gradient(135deg,#1B4FD8,#0EA5E9);box-shadow:0 4px 24px rgba(27,79,216,.4)">
                        🚀 Kirim Aspirasi
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

<style>
    input::placeholder, textarea::placeholder { color: rgba(148,163,184,.5); }
    input:focus, select:focus, textarea:focus {
        border-color: #38BDF8 !important;
        box-shadow: 0 0 0 3px rgba(56,189,248,.12);
    }
    select option { background: #0f2240; }
</style>
@endsection
