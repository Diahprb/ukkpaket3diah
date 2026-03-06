@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 px-4" style="background:#0B1D3A">
<div class="min-w-xl mx-auto">

    {{-- Hero Header --}}
    @php
        $statusMap = match($aspirasi->status) {
            'pending'  => ['label' => 'Pending',  'tc' => 'text-amber-400',   'bg' => 'rgba(245,158,11,.15)',  'dot' => 'bg-amber-400',   'blink' => 'dot-blink'],
            'proses'   => ['label' => 'Diproses', 'tc' => 'text-sky-400',     'bg' => 'rgba(56,189,248,.15)',  'dot' => 'bg-sky-400',     'blink' => 'dot-blink'],
            'ditolak'  => ['label' => 'Ditolak',  'tc' => 'text-red-400',     'bg' => 'rgba(239,68,68,.15)',   'dot' => 'bg-red-400',     'blink' => ''],
            'selesai'  => ['label' => 'Selesai',  'tc' => 'text-emerald-400', 'bg' => 'rgba(16,185,129,.15)', 'dot' => 'bg-emerald-400', 'blink' => ''],
            default    => ['label' => ucfirst($aspirasi->status), 'tc' => 'text-slate-400', 'bg' => 'rgba(255,255,255,.08)', 'dot' => 'bg-slate-400', 'blink' => ''],
        };
    @endphp

    <div class="rounded-2xl p-7 mb-6 relative overflow-hidden border border-sky-400/20"
         style="background:linear-gradient(135deg,rgba(27,79,216,.35),rgba(14,165,233,.18))">
        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-[64px] opacity-[.1] pointer-events-none select-none">📋</div>
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
    <div class="rounded-2xl border border-white/[.07] overflow-hidden mb-4" style="background:rgba(255,255,255,.04)">

        {{-- Keterangan --}}
        <div class="p-6 border-b border-white/[.06]">
            <div class="text-[11px] text-slate-500 uppercase tracking-widest font-semibold mb-2">Keterangan</div>
            <p class="text-[14px] text-white/80 leading-relaxed">{{ $aspirasi->keterangan }}</p>
        </div>

        {{-- Bukti Lapor --}}
        @if($aspirasi->bukti_lapor)
            <div class="p-6 border-b border-white/[.06] flex flex-col items-center jusitfy-center">
                <div class="text-[11px] text-slate-500 uppercase tracking-widest  font-semibold mb-3">Bukti Laporan</div>
                <img src="{{ asset('storage/' . $aspirasi->bukti_lapor) }}"
                     class="rounded-xl border border-white/10 max-w-xs w-full object-cover">
            </div>
        @endif

        {{-- Feedback --}}
        @if($aspirasi->feedback)
            <div class="p-6 border-b border-white/[.06]">
                <div class="text-[11px] text-slate-500 uppercase tracking-widest font-semibold mb-2">Balasan Admin</div>
                <div class="rounded-xl p-4 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
                    <div class="text-[11px] text-emerald-400 font-bold mb-1.5">💬 Feedback</div>
                    <p class="text-[13.5px] text-white/75 leading-relaxed">{{ $aspirasi->feedback }}</p>
                </div>
            </div>
        @else
            <div class="p-6 border-b border-white/[.06]">
                <div class="rounded-xl p-4 border border-amber-400/20 text-[13px] text-amber-400/80 font-medium"
                     style="background:rgba(245,158,11,.06)">
                    ⏳ Belum ada balasan dari admin
                </div>
            </div>
        @endif

        {{-- Meta --}}
        <div class="px-6 py-4 flex items-center justify-between">
            <div class="text-[12px] text-slate-500">
                📅 {{ $aspirasi->created_at->translatedFormat('j M Y, H:i') }}
            </div>
        </div>

    </div>

    {{-- Actions --}}
    <div class="flex gap-3">
        <a href="{{ route('aspirasi.index') }}"
           class="px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-white/10 text-slate-300 hover:bg-white/10 transition-all text-center"
           style="background:rgba(255,255,255,.06)">
            ← Kembali
        </a>

        <a href="{{ route('aspirasi.edit', $aspirasi->id) }}"
           class="px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-amber-400/20 text-amber-400 hover:bg-amber-400/10 transition-all text-center"
           style="background:rgba(245,158,11,.07)">
            ✏️ Edit
        </a>

        <form action="{{ route('aspirasi.destroy', $aspirasi->id) }}" method="POST"
              onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')" class="ml-auto">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-red-500/20 text-red-400 hover:bg-red-500/10 transition-all"
                    style="background:rgba(239,68,68,.06)">
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
