<x-filament-panels::page>
    <x-filament::section>
    {{ $this->content }}
    </x-filament::section>

    <x-filament::section>
        <x-slot name="heading">
            {{ $record->name }} — Aspirasi
        </x-slot>

        <x-slot name="description">
            Daftar lengkap aspirasi yang dibuat oleh siswa ini.
        </x-slot>

        <div class="space-y-6">
            @if($record->aspirasis->isEmpty())
                <div class="text-sm text-gray-600">Belum ada aspirasi.</div>
            @else
                @php
                   $grid =  $record->aspirasis->count() > 3 ? 'grid-cols-2' : ''
                @endphp
                <div class="grid gap-4 md:{{ $grid }}">
                    @foreach($record->aspirasis as $asp)
                        <div class="bg-white p-4 rounded shadow border border-0.5 border-gray-500/20 cursor-pointer"
                            onclick="window.location='{{ route('filament.admin.resources.aspirasis.view', $asp->id) }}'">
                            <div class="flex justify-between items-start">
                                <div>
                                    <div class="text-sm text-gray-500">{{ $asp->kategori?->nama_kategori ?? 'Umum' }}</div>
                                    <div class="text-lg font-semibold">{{ $asp->judul }}</div>
                                    <div class="text-sm text-gray-700 mt-2">{{ Str::limit($asp->keterangan, 160) }}</div>
                                </div>
                                <div class="text-right ml-4">
                                    <div>
                                        <span class="px-2 py-1 rounded-full text-xs font-semibold capitalize {{ $asp->status === 'selesai' ? 'bg-green-100 text-green-800' : ($asp->status === 'proses' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-800') }}">{{ $asp->status }}</span>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-2">{{ $asp->created_at->format('d M Y H:i') }}</div>
                                    <div class="mt-3"><a href="{{ route('filament.admin.resources.aspirasis.view', $asp->id) }}" class="text-primary-600 hover:underline">Lihat detail</a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </x-filament::section>
</x-filament-panels::page>
