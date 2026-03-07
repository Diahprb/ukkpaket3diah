@extends('layouts.app')

@section('content')
<div class="min-h-screen px-4">
<div class="min-w-xl mx-auto">

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
        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-[64px] opacity-[.08] pointer-events-none select-none">💬</div>
        <div class="text-[11.5px] text-sky-400 font-bold mb-2">
            #{{ str_pad($aspirasi->id, 3, '0', STR_PAD_LEFT) }} &nbsp;·&nbsp; {{ $aspirasi->kategori->nama_kategori }}
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
    <div class="rounded-2xl border border-gray-200 bg-white shadow-md overflow-hidden mb-4">

        {{-- Aspirasi --}}
        <div class="p-6 border-b border-gray-100">
            <div class="text-[11px] text-slate-400 uppercase tracking-widest font-semibold mb-2">Aspirasi Kamu</div>
            <p class="text-[14px] text-gray-700 leading-relaxed">{{ $aspirasi->keterangan }}</p>
        </div>

        @if($aspirasi->bukti_lapor)
            <div class="p-6 border-b border-gray-100 flex flex-col items-center min-w-4xl">
                <div class="text-[11px] text-slate-400 uppercase tracking-widest font-semibold mb-3">Bukti Laporan</div>
                <img src="{{ asset('storage/' . $aspirasi->bukti_lapor) }}"
                     class="rounded-xl border border-gray-200 max-w-xs w-full object-cover">
            </div>
        @endif

        @if($aspirasi->bukti_hasil)
            <div class="p-6 border-b border-gray-100 flex flex-col items-center min-w-4xl">
                <div class="text-[11px] text-slate-400 uppercase tracking-widest font-semibold mb-3">Bukti Hasil Proses</div>
                <img src="{{ asset('storage/' . $aspirasi->bukti_hasil) }}"
                     class="rounded-xl border border-gray-200 max-w-xs w-full object-cover">
            </div>
        @endif

        {{-- Balasan Admin --}}
        <div class="p-6 border-b border-gray-100">
            <div class="text-[11px] text-slate-400 uppercase tracking-widest font-semibold mb-3">Balasan Admin</div>
            <div class="rounded-xl p-4 border border-emerald-200 bg-emerald-50">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-8 h-8 rounded-full bg-emerald-500 flex items-center justify-center text-white text-[13px] font-bold">A</div>
                    <div>
                        <div class="text-[12px] font-bold text-emerald-700">Admin</div>
                        <div class="text-[10.5px] text-emerald-500">{{ $aspirasi->updated_at->translatedFormat('j M Y, H:i') }}</div>
                    </div>
                </div>
                <p class="text-[13.5px] text-gray-700 leading-relaxed">{{ $aspirasi->feedback }}</p>
            </div>
        </div>

        {{-- Rating --}}
        @if($aspirasi->status === 'selesai')
            <div class="p-6 border-b border-gray-100">
                <div class="text-[11px] text-slate-400 uppercase tracking-widest font-semibold mb-3">Penilaian Kamu</div>
                <div class="rounded-xl p-4 border border-sky-200 bg-sky-50">
                    <div class="text-[12px] font-semibold text-sky-700 mb-3">⭐ Bagaimana penanganannya?</div>
                    <div class="flex gap-2">
                        @foreach(['😞','😐','😊','😄','🤩'] as $i => $emoji)
                            <button onclick="setRating({{ $i + 1 }})"
                                    id="rating-{{ $i + 1 }}"
                                    class="rating-btn flex-1 py-2 rounded-lg border border-gray-200 bg-white text-[20px] hover:border-sky-300 hover:bg-sky-50 transition-all">
                                {{ $emoji }}
                            </button>
                        @endforeach
                    </div>
                    <div id="rating-label" class="text-[11px] text-slate-400 text-center mt-2 h-4"></div>
                </div>
            </div>
        @endif

        {{-- Meta --}}
        <div class="px-6 py-4 bg-gray-50">
            <div class="text-[12px] text-slate-400">📅 {{ $aspirasi->created_at->translatedFormat('j M Y, H:i') }}</div>
        </div>

    </div>

    {{-- Back --}}
    <a href="{{ route('aspirasi.feedback') }}"
       class="inline-block px-5 py-2.5 rounded-xl text-[13.5px] font-semibold border border-gray-200 text-slate-600 hover:bg-gray-100 transition-all bg-white shadow-sm">
        ← Kembali
    </a>

</div>
</div>

<style>
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.3} }
    .dot-blink { animation: blink 1.5s infinite; }
    .rating-btn.active { border-color: #38BDF8 !important; background: #e0f2fe; transform: scale(1.1); }
</style>

<script>
    const labels = ['Sangat Kecewa','Kurang Puas','Cukup','Puas','Sangat Puas'];
    function setRating(val) {
        document.querySelectorAll('.rating-btn').forEach((b, i) => {
            b.classList.toggle('active', i + 1 === val);
        });
        document.getElementById('rating-label').textContent = labels[val - 1];
    }
</script>
@endsection
