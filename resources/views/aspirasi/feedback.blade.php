@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 px-4">
<div class="min-w-6xl mx-auto">

    {{-- Hero Header --}}
    <div class="rounded-2xl p-7 mb-6 relative overflow-hidden border border-sky-100 bg-[#003566]">
        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-[64px] opacity-[.08] pointer-events-none select-none">💬</div>
        <div class="font-extrabold text-[22px] text-white mb-1.5 tracking-tight">Umpan Balik</div>
        <div class="text-[13.5px] text-white/60">Balasan admin atas aspirasi yang kamu kirimkan.</div>
    </div>

    {{-- List --}}
    <div class="flex flex-col gap-3">

        @forelse($aspirasis as $asp)
            @php
                $statusMap = match($asp->status) {
                    'pending'  => ['label' => 'Pending',  'tc' => 'text-amber-500',   'bg' => 'rgba(245,158,11,.12)',  'dot' => 'bg-amber-400',  'blink' => 'dot-blink'],
                    'proses'   => ['label' => 'Diproses', 'tc' => 'text-sky-500',     'bg' => 'rgba(56,189,248,.12)',  'dot' => 'bg-sky-400',    'blink' => 'dot-blink'],
                    'ditolak'  => ['label' => 'Ditolak',  'tc' => 'text-red-500',     'bg' => 'rgba(239,68,68,.12)',   'dot' => 'bg-red-400',    'blink' => ''],
                    'selesai'  => ['label' => 'Selesai',  'tc' => 'text-emerald-500', 'bg' => 'rgba(16,185,129,.12)', 'dot' => 'bg-emerald-400','blink' => ''],
                    default    => ['label' => ucfirst($asp->status), 'tc' => 'text-slate-500', 'bg' => 'rgba(0,0,0,.06)', 'dot' => 'bg-slate-400', 'blink' => ''],
                };
            @endphp

            <div onclick="window.location='{{ route('aspirasi.feedback.show', $asp->id) }}'"
                 class="card-hover rounded-2xl p-5 border border-gray-200 bg-white shadow-md cursor-pointer">

                <div class="flex items-start justify-between gap-3 mb-3">
                    <div class="flex-1 min-w-0">
                        <div class="text-[11.5px] font-semibold text-sky-400 mb-1">
                            {{ $asp->kategori->nama_kategori }}
                        </div>
                        <div class="text-[15px] font-bold text-gray-700 truncate">
                            {{ $asp->judul }}
                        </div>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold flex-shrink-0 {{ $statusMap['tc'] }}"
                          style="background:{{ $statusMap['bg'] }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $statusMap['dot'] }} {{ $statusMap['blink'] }} inline-block"></span>
                        {{ $statusMap['label'] }}
                    </span>
                </div>

                {{-- Preview feedback --}}
                <div class="rounded-xl px-3.5 py-2.5 border border-emerald-200 bg-emerald-50">
                    <div class="flex items-center gap-1.5 mb-1">
                        <div class="w-5 h-5 rounded-full bg-emerald-500 flex items-center justify-center text-white text-[9px] font-bold">A</div>
                        <span class="text-[10.5px] font-bold text-emerald-600">Admin</span>
                        <span class="text-[10px] text-slate-400 ml-auto">{{ $asp->updated_at->translatedFormat('j M Y') }}</span>
                    </div>
                    <p class="text-[12.5px] text-gray-600 line-clamp-2">{{ $asp->feedback }}</p>
                </div>

            </div>

        @empty
            <div class="rounded-2xl p-10 text-center border border-dashed border-white/10"
                 style="background:rgba(255,255,255,.03)">
                <div class="text-4xl mb-3 opacity-30">💬</div>
                <div class="text-[14px] font-semibold text-slate-400 mb-1">Belum ada umpan balik</div>
                <div class="text-[12.5px] text-slate-500">Admin belum membalas aspirasi kamu.</div>
            </div>
        @endforelse

    </div>

    {{-- Pagination --}}
    @if($aspirasis->hasPages())
        <div class="mt-6">{{ $aspirasis->links() }}</div>
    @endif

</div>
</div>

<style>
    .card-hover { transition: transform .15s, border-color .15s; }
    .card-hover:hover { transform: translateY(-2px); border-color: rgba(56,189,248,.4) !important; }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.3} }
    .dot-blink { animation: blink 1.5s infinite; }
</style>
@endsection
