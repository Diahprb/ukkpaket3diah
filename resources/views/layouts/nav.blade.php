@php
    $hidden = request()->routeIs('login') ? 'hidden' : '';
@endphp

<nav class="{{ $hidden }} border-b border-blue-600/[.08] flex justify-between items-center px-6 py-1 w-full bg-black">
    <h1 class="font-bold text-2xl text-white">BeriAspirasi</h1>
    <div class="grid grid-cols-[100px_100px_100px] items-center">
        <a href="{{ route('aspirasi.index') }}">
            <label class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-[11px] font-semibold gap-1">
                <x-heroicon-o-home class="w-6 h-6 {{ request()->routeIs('aspirasi.index') ? 'text-blue-500' : 'text-gray-600' }}"/>
                <span class="{{ request()->routeIs('aspirasi.index') ? 'text-blue-500' : 'text-gray-600' }}">Beranda</span>
            </label>
        </a>
        <a href="{{ route('aspirasi.histori') }}">
            <label class="relative flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-[11px] font-semibold gap-1">
                @if(isset($totalAspirasi) && $totalAspirasi > 0)
                    <span class="absolute -top-1 -right-1 min-w-[18px] h-[18px] px-1 rounded-full bg-sky-400 text-[9px] font-bold flex items-center justify-center text-[#0B1D3A]">
                        {{ $totalAspirasi > 99 ? '99+' : $totalAspirasi }}
                    </span>
                @endif
                <x-heroicon-o-clock class="w-6 h-6 {{ request()->routeIs('aspirasi.histori') ? 'text-blue-500' : 'text-gray-600' }}"/>
                <span class="{{ request()->routeIs('aspirasi.histori') ? 'text-blue-500' : 'text-gray-600' }}">Histori</span>
            </label>
        </a>

        <a href="{{ route('aspirasi.feedback') }}">
            <label class="flex flex-col items-center py-2.5 rounded-xl cursor-pointer transition-all text-[11px] font-semibold gap-1">
                <x-heroicon-o-chat-bubble-bottom-center class="w-6 h-6 {{ request()->routeIs('aspirasi.feedback') ? 'text-blue-500' : 'text-gray-600' }}"/>
                <span class="{{ request()->routeIs('aspirasi.feedback') ? 'text-blue-500' : 'text-gray-600' }}">Umpan Balik</span>
            </label>
        </a>
    </div>


    {{-- Kanan: Logout --}}
    <div class="flex items-center justify-end">
        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <div x-data="{ open: false }">

                <button
                    type="button"
                    @click="open = true"
                    class="flex items-center px-4 py-2 rounded-xl text-[13px] font-semibold text-gray-600 border border-white/20 hover:bg-white/20 transition-all cursor-pointer"
                >
                    <x-heroicon-o-arrow-left-start-on-rectangle class="w-5 h-5 mr-2"/>
                    Logout
                </button>

                {{-- Modal Konfirmasi --}}
                <div
                    x-show="open"
                    x-transition
                    class="fixed inset-0 flex items-center justify-center z-50"
                    style="background: rgba(0,0,0,0.5)"
                >
                    <div
                        @click.away="open = false"
                        class="bg-white rounded-xl shadow-lg p-6 w-[320px]"
                    >
                        <h2 class="text-lg font-semibold mb-2">Konfirmasi Logout</h2>
                        <p class="text-sm text-gray-500 mb-6">Apakah kamu yakin ingin keluar dari sistem?</p>

                        <div class="flex justify-end gap-3">
                            <button
                                type="button"
                                @click="open = false"
                                class="px-4 py-2 text-sm rounded-lg bg-gray-200 hover:bg-gray-300"
                            >
                                Batal
                            </button>
                            <button
                                type="submit"
                                class="px-4 py-2 text-sm rounded-lg bg-red-500 text-white hover:bg-red-600"
                            >
                                Ya, Logout
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

</nav>
