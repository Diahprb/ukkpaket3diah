@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10 px-4" style="background:#0B1D3A">
<div class="max-w-2xl mx-auto">

    {{-- Hero Header --}}
    <div class="rounded-2xl p-7 mb-6 relative overflow-hidden border border-sky-400/20"
         style="background:linear-gradient(135deg,rgba(27,79,216,.35),rgba(14,165,233,.18))">
        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-[72px] opacity-[.1] pointer-events-none select-none">🎓</div>
        <div class="flex items-start justify-between">
            <div>
                <div class="font-extrabold text-[22px] text-white mb-1 tracking-tight">Aspirasi Saya</div>
                <div class="text-[13.5px] text-white/60">Suarakan aspirasimu untuk sekolah yang lebih baik.</div>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <a href="{{ route('aspirasi.create') }}"
                   class="inline-flex items-center gap-1.5 px-4 py-2.5 rounded-xl text-[13px] font-bold text-white transition-all hover:opacity-90 hover:-translate-y-0.5"
                   style="background:linear-gradient(135deg,#1B4FD8,#0EA5E9);box-shadow:0 4px 20px rgba(27,79,216,.4)">
                    📝 Buat
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="px-4 py-2.5 rounded-xl text-[13px] font-semibold text-slate-300 border border-white/10 hover:bg-white/10 transition-all"
                            style="background:rgba(255,255,255,.06)">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="flex items-center gap-3 rounded-xl px-4 py-3 mb-5 border border-emerald-500/25 text-[13px] font-semibold text-emerald-400"
             style="background:rgba(16,185,129,.08)">
            <span>✅</span>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- List --}}
    <div class="space-y-3.5">

        @forelse($aspirasis as $asp)

            @php
                $statusMap = match($asp->status) {
                    'pending' => ['label' => 'Pending',  'tc' => 'text-amber-400',  'bg' => 'rgba(245,158,11,.15)',  'dot' => 'bg-amber-400',  'blink' => 'dot-blink'],
                    'proses'  => ['label' => 'Diproses', 'tc' => 'text-sky-400',    'bg' => 'rgba(56,189,248,.15)', 'dot' => 'bg-sky-400',    'blink' => 'dot-blink'],
                    'selesai' => ['label' => 'Selesai',  'tc' => 'text-emerald-400','bg' => 'rgba(16,185,129,.15)', 'dot' => 'bg-emerald-400','blink' => ''],
                    default   => ['label' => ucfirst($asp->status), 'tc' => 'text-slate-400', 'bg' => 'rgba(255,255,255,.08)', 'dot' => 'bg-slate-400', 'blink' => ''],
                };
            @endphp

            <div onclick="window.location='{{ route('aspirasi.show', $asp->id) }}'"
                 class="card-hover rounded-2xl p-5 border border-white/[.07] cursor-pointer"
                 style="background:rgba(255,255,255,.04)">

                <div class="flex items-start justify-between gap-3">

                    {{-- Left --}}
                    <div class="flex-1 min-w-0">
                        <div class="text-[11.5px] font-semibold text-sky-400 mb-1">
                            {{ $asp->kategori->nama_kategori }}
                        </div>
                        <div class="text-[15px] font-bold text-white truncate">
                            {{ $asp->judul }}
                        </div>
                        @if($asp->feedback)
                            <div class="mt-2.5 rounded-xl px-3.5 py-2.5 border border-emerald-500/20 text-[12.5px] text-white/70 line-clamp-2"
                                 style="background:rgba(16,185,129,.07)">
                                💬 {{ $asp->feedback }}
                            </div>
                        @endif
                    </div>

                    {{-- Right --}}
                    <div class="flex flex-col items-end gap-3 flex-shrink-0">

                        {{-- Status badge --}}
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold {{ $statusMap['tc'] }}"
                              style="background:{{ $statusMap['bg'] }}">
                            <span class="w-1.5 h-1.5 rounded-full {{ $statusMap['dot'] }} {{ $statusMap['blink'] }} inline-block"></span>
                            {{ $statusMap['label'] }}
                        </span>

                        {{-- Actions --}}
                        <div class="flex items-center gap-2" onclick="event.stopPropagation()">
                            <a href="{{ route('aspirasi.edit', $asp->id) }}"
                               class="px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-slate-300 border border-white/10 hover:bg-white/10 transition-all"
                               style="background:rgba(255,255,255,.06)">
                                ✏️ Edit
                            </a>
                            <form action="{{ route('aspirasi.destroy', $asp->id) }}" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus aspirasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1.5 rounded-lg text-[11.5px] font-semibold text-red-400 border border-red-500/20 hover:bg-red-500/10 transition-all"
                                        style="background:rgba(239,68,68,.06)">
                                    🗑 Hapus
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        @empty
            <div class="rounded-2xl p-10 text-center border border-dashed border-white/10"
                 style="background:rgba(255,255,255,.03)">
                <div class="text-4xl mb-3 opacity-30">📭</div>
                <div class="text-[14px] font-semibold text-slate-400 mb-1">Belum ada aspirasi</div>
                <div class="text-[12.5px] text-slate-500 mb-5">Jadilah yang pertama menyuarakan aspirasimu!</div>
                <a href="{{ route('aspirasi.create') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-[13px] font-bold text-white transition-all hover:opacity-90"
                   style="background:linear-gradient(135deg,#1B4FD8,#0EA5E9);box-shadow:0 4px 20px rgba(27,79,216,.35)">
                    📝 Buat Aspirasi Pertama
                </a>
            </div>
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
</style>
@endsection
