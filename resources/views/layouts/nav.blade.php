<nav class="border-b border-white/[.08] px-20 py-2 grid grid-cols-[100px_100px_100px_100px] justify-center gap-2" style="background:rgba(11,29,58,.95);backdrop-filter:blur(16px)">

    <a href="{{ route('aspirasi.index') }}">
        <label for="tab-beranda" class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white" style="background:rgba(255,255,255,.04)">
            <span class="text-lg">🏠</span>Beranda
        </label>
    </a>
    <a href="{{ route('aspirasi.create') }}">
        <label for="tab-form" class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white" style="background:rgba(255,255,255,.04)">
            <span class="text-lg">📝</span>Buat
        </label>
    </a>
    <a href="{{ route('aspirasi.histori') }}">
    <label for="tab-histori"
       class="relative flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white"
       style="background:rgba(255,255,255,.04)">

        @if(isset($totalAspirasi) && $totalAspirasi > 0)
            <span class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-sky-400 text-navy text-[9px] font-bold flex items-center justify-center"
                style="color:#0B1D3A">
                {{ $totalAspirasi > 99 ? '99+' : $totalAspirasi }}
            </span>
        @endif

        <span class="text-lg">🕐</span>
        Histori
    </label>
    </a>
    <a href="{{ route('aspirasi.histori') }}">
    <label for="tab-histori"
       class="relative flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white"
       style="background:rgba(255,255,255,.04)">

        @if(isset($totalAspirasi) && $totalAspirasi > 0)
            <span class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-sky-400 text-navy text-[9px] font-bold flex items-center justify-center"
                style="color:#0B1D3A">
                {{ $totalAspirasi > 99 ? '99+' : $totalAspirasi }}
            </span>
        @endif

        <span class="text-lg">💬</span>
        Umpan Balik
    </label>
    </a>
    {{-- <label for="tab-umpan" class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white" style="background:rgba(255,255,255,.04)">
        <span class="text-lg">💬</span>Umpan Balik
        <span class="bg-sky text-navy text-[9px] font-bold px-1.5 py-0.5 rounded-full -mt-0.5">3</span>
    </label> --}}
</nav>
