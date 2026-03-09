@extends('layouts.app')

@section('title', 'Histori Aspirasi')

@section('content')
<div>
<div class="min-w-6xl bg-white mx-auto p-4 rounded-3xl shadow-lg p-12">

    {{-- Header --}}
    <div class="mb-6">
        <div class="font-extrabold text-[22px] text-black tracking-tight">Histori Aspirasi 🕐</div>
        <div class="text-[13.5px] text-slate-400 mt-1">Semua aspirasi yang pernah kamu ajukan</div>
    </div>

    {{-- Stats --}}
    @php
        $total   = $aspirasis->total();
        $selesai = $aspirasis->getCollection()->where('status', 'selesai')->count();
        $proses  = $aspirasis->getCollection()->where('status', 'proses')->count();
        $pct     = $total > 0 ? round($selesai / $total * 100) : 0;
    @endphp

    <div class="grid grid-cols-4 gap-3.5 mb-6">

        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-sky-400/20" style="background:rgba(56,189,248,.1)">
            <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:linear-gradient(90deg,#1B4FD8,#38BDF8)"></div>
            <div class="font-extrabold text-[28px] text-sky-400">{{ $total }}</div>
            <div class="text-[12px] text-slate-400">Total</div>
        </div>

        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-emerald-500/20" style="background:rgba(16,185,129,.1)">
            <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#10B981"></div>
            <div class="font-extrabold text-[28px] text-emerald-400">{{ $selesai }}</div>
            <div class="text-[12px] text-slate-400">Selesai</div>
        </div>

        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-amber-400/20" style="background:rgba(245,158,11,.1)">
            <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#F59E0B"></div>
            <div class="font-extrabold text-[28px] text-amber-400">{{ $proses }}</div>
            <div class="text-[12px] text-slate-400">Diproses</div>
        </div>

        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-violet-400/20" style="background:rgba(139,92,246,.1)">
            <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#8B5CF6"></div>
            <div class="font-extrabold text-[28px] text-violet-300">{{ $pct }}%</div>
            <div class="text-[12px] text-slate-400">Tingkat Selesai</div>
        </div>

    </div>

    {{-- Filter Pills --}}
    <div class="flex gap-2 flex-wrap mb-5">
        @php
            $filters = [
                ''        => 'Semua',
                'menunggu' => 'Menunggu',
                'proses'  => 'Diproses',
                'selesai' => 'Selesai',
            ];
            $active = request('status', '');
        @endphp
        @foreach($filters as $val => $label)
            <a href="{{ request()->fullUrlWithQuery(['status' => $val]) }}"
               class="px-3.5 py-2 rounded-xl text-[12.5px] font-semibold border transition-all
                      {{ $active === $val
                          ? 'text-sky-400 border-sky-400/50'
                          : 'text-slate-400 border-white/10 hover:text-black' }}"
               style="{{ $active === $val
                          ? 'background:rgba(56,189,248,.12)'
                          : 'background:rgba(255,255,255,.05)' }}">
                {{ $label }}
            </a>
        @endforeach
    </div>

    {{-- Cards --}}
    <div class="space-y-3.5">

        @forelse($aspirasis as $asp)

            @php
                $statusMap = match($asp->status) {
                    'pending' => [
                        'label' => 'Pending',
                        'tc' => 'text-amber-400',
                        'bg' => 'rgba(245,158,11,.15)',
                        'dot' => 'bg-amber-400',
                        'blink' => 'dot-blink',
                        'step' => 1
                    ],

                    'ditinjau' => [
                        'label' => 'Ditinjau',
                        'tc' => 'text-indigo-400',
                        'bg' => 'rgba(99,102,241,.15)',
                        'dot' => 'bg-indigo-400',
                        'blink' => 'dot-blink',
                        'step' => 2
                    ],

                    'proses' => [
                        'label' => 'Diproses',
                        'tc' => 'text-sky-400',
                        'bg' => 'rgba(56,189,248,.15)',
                        'dot' => 'bg-sky-400',
                        'blink' => 'dot-blink',
                        'step' => 3
                    ],

                    'selesai' => [
                        'label' => 'Selesai',
                        'tc' => 'text-emerald-400',
                        'bg' => 'rgba(16,185,129,.15)',
                        'dot' => 'bg-emerald-400',
                        'blink' => '',
                        'step' => 4
                    ],

                    default => [
                        'label' => ucfirst($asp->status),
                        'tc' => 'text-slate-400',
                        'bg' => 'rgba(255,255,255,.08)',
                        'dot' => 'bg-slate-400',
                        'blink' => '',
                        'step' => 1
                    ],
                };

                $steps = [
                    1 => 'Diterima',
                    2 => 'Ditinjau',
                    3 => 'Perbaikan',
                    4 => 'Selesai',
                ];
            @endphp

            <div onclick="window.location='{{ route('aspirasi.show', $asp->id) }}'"
                 class="card-hover rounded-2xl p-5 border border-black/[.07] cursor-pointer"
                 style="background:rgba(255,255,255,.04)">

                {{-- Top row --}}
                <div class="flex items-start justify-between mb-2">
                    <div>
                        <div class="text-[11px] text-sky-400 font-bold">#{{ str_pad($asp->id, 3, '0', STR_PAD_LEFT) }}</div>
                        <div class="text-[15px] font-bold text-gray-500 mt-0.5">{{ $asp->judul }}</div>
                        <div class="text-[12px] text-slate-400 mt-1">
                            📅 {{ $asp->created_at->translatedFormat('j M Y') }}
                            &nbsp;·&nbsp;
                            🏷 {{ $asp->kategori->nama_kategori }}
                        </div>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold {{ $statusMap['tc'] }} flex-shrink-0"
                          style="background:{{ $statusMap['bg'] }}">
                        <span class="w-1.5 h-1.5 rounded-full {{ $statusMap['dot'] }} {{ $statusMap['blink'] }} inline-block"></span>
                        {{ $statusMap['label'] }}
                    </span>
                </div>

                {{-- Deskripsi --}}
                <div class="text-[13px] text-white/60 leading-relaxed mb-3 line-clamp-2">
                    {{ $asp->keterangan }}
                </div>

                {{-- Progress track --}}
                <div class="prog-track ">
                    @foreach($steps as $n => $lbl)
                        @php
                            $done   = $n < $statusMap['step'] || $statusMap['label'] == 'Selesai';
                            $active = $n === $statusMap['step'];
                        @endphp
                        <div class="prog-step">
                            @if($done)
                                <div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div>
                            @elseif($active)
                                <div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-white"
                                     style="background:#1B4FD8;box-shadow:0 0 0 4px rgba(27,79,216,.3)">{{ $n }}</div>
                            @else
                                <div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400"
                                     style="background:rgba(255,255,255,.08)">{{ $n }}</div>
                            @endif
                            <div class="text-[9px] text-center mt-1 {{ $active ? 'text-green-600 font-semibold' : 'text-slate-400' }}">
                                {{ $lbl }}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Feedback --}}
                @if($asp->feedback)
                    <div class="rounded-xl p-3.5 mt-3 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
                        <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Balasan Admin</div>
                        <div class="text-[13px] text-white/75 line-clamp-2">{{ $asp->feedback }}</div>
                    </div>
                @else
                    <div class="rounded-xl p-3 mt-3 border border-amber-400/20 text-[12px] text-amber-400/80 font-medium"
                         style="background:rgba(245,158,11,.06)">
                        ⏳ Menunggu umpan balik dari admin
                    </div>
                @endif

            </div>

        @empty
           <div></div>
        @endforelse

    </div>

    {{-- Pagination --}}
    @if($aspirasis->hasPages())
        <div class="mt-6">
            {{ $aspirasis->links() }}
        </div>
    @endif

</div>
</div>

<style>
    .card-hover { transition: transform .15s, border-color .15s; }
    .card-hover:hover { transform: translateY(-2px); border-color: rgba(56,189,248,.25) !important; }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:.3} }
    .dot-blink { animation: blink 1.5s infinite; }
    .prog-track {
        display: flex; align-items: flex-start;
        position: relative; margin: 14px 0;
    }
    .prog-track::before {
        content: ''; position: absolute;
        top: 14px; left: 14px; right: 14px;
        height: 2px; background: rgba(34, 34, 34, 0.08); z-index: 0;
    }
    .prog-step {
        flex: 1; display: flex; flex-direction: column;
        align-items: center; gap: 5px;
        position: relative; z-index: 1;
    }
</style>
@endsection
