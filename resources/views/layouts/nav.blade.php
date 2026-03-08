@php
    $hidden = request()->routeIs('login') ? 'hidden' : '';
@endphp
<nav class="{{ $hidden }} border-b border-b-3 flex border-blue-600/[.08] px-20 py-1 grid grid-cols-[100px_100px_100px_100px_50px] justify-center gap-2 rounded">

    <a href="{{ route('aspirasi.index') }}">
        <label class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-[11px] font-semibold gap-1"
            style="background:rgba(255,255,255,.04)">
            <x-heroicon-o-home class="w-6 h-6 {{ request()->routeIs('aspirasi.index') ? 'text-blue-500' : 'text-gray-500' }}"/>
            <span class="text-md {{ request()->routeIs('aspirasi.index') ? 'text-blue-500' : 'text-gray-500' }}">Beranda</span>
        </label>
    </a>

    <a href="{{ route('aspirasi.histori') }}">
        <label class="relative flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-[11px] font-semibold gap-1"
            style="background:rgba(255,255,255,.04)">

            @if(isset($totalAspirasi) && $totalAspirasi > 0)
                <span class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-sky-400 text-[9px] font-bold flex items-center justify-center"
                    style="color:#0B1D3A">
                    {{ $totalAspirasi > 99 ? '99+' : $totalAspirasi }}
                </span>
            @endif

            <x-heroicon-o-clock class="w-6 h-6 {{ request()->routeIs('aspirasi.histori') ? 'text-blue-500' : 'text-gray-500' }}"/>
            <span class="text-md {{ request()->routeIs('aspirasi.histori') ? 'text-blue-500' : 'text-gray-500' }}">Histori</span>
        </label>
    </a>

    <a href="{{ route('aspirasi.feedback') }}">
        <label class="relative flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-[11px] font-semibold gap-1"
            style="background:rgba(255,255,255,.04)">

            <x-heroicon-o-chat-bubble-bottom-center class="w-6 h-6 {{ request()->routeIs('aspirasi.feedback') ? 'text-blue-500' : 'text-gray-500' }}"/>
            <span class="text-md {{ request()->routeIs('aspirasi.feedback') ? 'text-blue-500' : 'text-gray-500' }}">Feedback</span>
        </label>
    </a>
    <div></div>
     <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="flex px-4 py-2.5 my-2 rounded-xl text-[13px] font-semibold text-gray-500 border border-white/10 hover:bg-white/10 transition-all items-center "
                style="background:rgba(230, 230, 230, 0.06)">
           <x-heroicon-o-arrow-left-start-on-rectangle class="w-6 h-6" /> Logout
        </button>
    </form>
</nav>
