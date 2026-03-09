@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 px-4">
<div class="min-w-6xl mx-auto">

    @php
        $statusMap = match($aspirasi->status) {
            'pending'  => ['label' => 'Pending',  'tc' => 'text-amber-500',   'bg' => 'rgba(245,158,11,.12)',  'dot' => 'bg-amber-400',   'blink' => 'dot-blink'],
            'proses'   => ['label' => 'Diproses', 'tc' => 'text-sky-500',     'bg' => 'rgba(56,189,248,.12)',  'dot' => 'bg-sky-400',     'blink' => 'dot-blink'],
            'ditolak'  => ['label' => 'Ditolak',  'tc' => 'text-red-500',     'bg' => 'rgba(239,68,68,.12)',   'dot' => 'bg-red-400',     'blink' => ''],
            'selesai'  => ['label' => 'Selesai',  'tc' => 'text-emerald-500', 'bg' => 'rgba(16,185,129,.12)', 'dot' => 'bg-emerald-400', 'blink' => ''],
            default    => ['label' => ucfirst($aspirasi->status), 'tc' => 'text-slate-500', 'bg' => 'rgba(0,0,0,.06)', 'dot' => 'bg-slate-400', 'blink' => ''],
        };
    @endphp

    {{-- Hero Header --}}
    <div class="rounded-2xl p-7 mb-6 relative overflow-hidden border border-sky-100 bg-[#003566]">
        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-[64px] opacity-[.08] pointer-events-none select-none">📋</div>
        <div class="text-[11.5px] text-sky-400 font-bold mb-2">
            #{{ str_pad($aspirasi->id, 3, '0', STR_PAD_LEFT) }}
            &nbsp;·&nbsp;
            {{ $aspirasi->kategori->nama_kategori }}
        </div>
        <h1 class="font-extrabold text-[20px] text-white mb-3 tracking-tight leading-snug pr-10">
            {{ $aspirasi->judul }}
        </h1>
        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[12px] font-semibold {{ $statusMap['tc'] }}"
              style="background:{{ $statusMap['bg'] }}">
            <span class="w-1.5 h-1.5 rounded-full {{ $statusMap['dot'] }} {{ $statusMap['blink'] }} inline-block"></span>
            {{ $statusMap['label'] }}
        </span>
    </div>

    {{-- Card --}}
    <div class="rounded-2xl border border-gray-200 overflow-hidden mb-4 bg-white shadow-md">

        {{-- Keterangan --}}
        <div class="p-6 border-b border-gray-100">
            <div class="text-[11px] text-slate-400 uppercase tracking-widest font-semibold mb-2">Keterangan</div>
            <p class="text-[14px] text-gray-700 leading-relaxed">{{ $aspirasi->keterangan }}</p>
        </div>

        {{-- Bukti Lapor --}}
        @if($aspirasi->bukti_lapor)
            <div class="p-6 border-b border-gray-100 flex flex-col items-center">
                <div class="text-[11px] text-slate-400 uppercase tracking-widest font-semibold mb-3">Bukti Laporan</div>
                <img src="{{ asset('storage/' . $aspirasi->bukti_lapor) }}"
                     class="rounded-xl border border-gray-200 max-w-xs w-full object-cover">
            </div>
        @endif

        {{-- Feedback --}}
        @if($aspirasi->feedback)
            <div class="p-6 border-b border-gray-100">
                <div class="text-[11px] text-slate-400 uppercase tracking-widest font-semibold mb-2">Balasan Admin</div>
                <div class="rounded-xl p-4 border border-emerald-200 bg-emerald-50">
                    <div class="text-[11px] text-emerald-600 font-bold mb-1.5">💬 Feedback</div>
                    <p class="text-[13.5px] text-gray-700 leading-relaxed">{{ $aspirasi->feedback }}</p>
                </div>
            </div>
        @else
            <div class="p-6 border-b border-gray-100">
                <div class="rounded-xl p-4 border border-amber-200 bg-amber-50 text-[13px] text-amber-600 font-medium">
                    ⏳ Belum ada balasan dari admin
                </div>
            </div>
        @endif

        {{-- Meta --}}
        <div class="px-6 py-4 flex items-center justify-between bg-gray-50">
            <div class="text-[12px] text-slate-400">
                📅 {{ $aspirasi->created_at->translatedFormat('j M Y, H:i') }}
            </div>
        </div>

    </div>

    {{-- Actions --}}
    <div class="flex gap-3">
        <a href="{{ route('aspirasi.index') }}"
           class="px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-gray-200 text-slate-600 hover:bg-gray-100 transition-all text-center bg-white shadow-sm">
            ← Kembali
        </a>

        <a href="{{ route('aspirasi.edit', $aspirasi->id) }}"
           class="px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-amber-200 text-amber-600 hover:bg-amber-50 transition-all text-center bg-white shadow-sm">
            ✏️ Edit
        </a>

        <form action="{{ route('aspirasi.destroy', $aspirasi->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')" class="ml-auto">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-red-200 text-red-500 hover:bg-red-50 transition-all bg-white shadow-sm">
                🗑 Hapus
            </button>
        </form>
    </div>

</div>
</div>

<style>
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.3} }
    .dot-blink { animation: blink 1.5s infinite; }
</style>
@endsection
