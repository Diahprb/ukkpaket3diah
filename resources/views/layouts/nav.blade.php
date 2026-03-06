@php
    $hidden = request()->routeIs('login') ? 'hidden' : '';
@endphp
<nav class="{{ $hidden }} border-b border-b-3 flex  border-blue-600/[.08] px-20 py-1 grid grid-cols-[100px_100px_100px] justify-center gap-2 rounded">

    <a href="{{ route('aspirasi.index') }}">
        <label for="tab-beranda" class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white" style="background:rgba(255,255,255,.04)">

            <x-heroicon-o-home class="w-6 h-6 text-black"/><span class="text-md text-gray-700">Beranda</span>
        </label>
    </a>
    <a href="{{ route('aspirasi.create') }}">
        <label for="tab-form" class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white" style="background:rgba(255,255,255,.04)">
            <x-heroicon-o-newspaper class="w-6 h-6 text-black"/><span class="text-md text-gray-700">Buat</span>
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

        <x-heroicon-o-clock class="w-6 h-6 text-black"/><span class="text-md text-gray-700">Histori</span>
    </label>
    </a>
    {{-- <a href="{{ route('aspirasi.histori') }}">
    <label for="tab-histori"
       class="relative flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white"
       style="background:rgba(255,255,255,.04)">

        @if(isset($totalAspirasi) && $totalAspirasi > 0)
            <span class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-sky-400 text-navy text-[9px] font-bold flex items-center justify-center"
                style="color:#0B1D3A">
                {{ $totalAspirasi > 99 ? '99+' : $totalAspirasi }}
            </span>
        @endif

        <x-heroicon-o-chat-bubble-bottom-center class="w-6 h-6 text-black"/><span class="text-md text-gray-700">Feedback</span>
    </label>
    </a> --}}
    {{-- <label for="tab-umpan" class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-slate-400 text-[11px] font-semibold gap-1 hover:text-white" style="background:rgba(255,255,255,.04)">
        <span class="text-md">💬</span>Umpan Balik
        <span class="bg-sky text-navy text-[9px] font-bold px-1.5 py-0.5 rounded-full -mt-0.5">3</span>
    </label> --}}
</nav>

