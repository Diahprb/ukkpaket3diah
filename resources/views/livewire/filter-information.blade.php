<x-filament-widgets::widget x-data="{ open: false }">

    <div style="margin-bottom:12px;">
        <button
            type="button"
            @click="open = !open"
            style="
                display:flex;
                align-items:center;
                gap:6px;
                background:#3b82f6;
                color:white;
                border:none;
                padding:6px 10px;
                border-radius:6px;
                font-size:13px;
                cursor:pointer;
            "
        >
            <x-heroicon-o-information-circle style="height:18px;width:18px"/>
            Informasi Filter
        </button>
    </div>

    <x-filament::section
        heading="Panduan Filter Aspirasi"
        x-show="open"
        x-transition.duration.1000ms
    >

        <div style="font-size:12px;color:#4b5563;line-height:1.6">

            <p style="margin-bottom:10px;">
                Gunakan filter di atas untuk mempersempit data aspirasi berdasarkan
                kriteria tertentu agar lebih mudah dianalisis atau diproses.
            </p>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px">

                <div>
                    <strong>Status</strong>
                    <ul style="margin-left:18px;margin-top:4px">
                        <li><b>Menunggu</b> — Aspirasi baru yang belum ditinjau.</li>
                        <li><b>Di Tinjau</b> — Aspirasi sedang diperiksa oleh admin.</li>
                        <li><b>Di Proses</b> — Aspirasi sedang dalam tahap penanganan.</li>
                        <li><b>Selesai</b> — Aspirasi telah selesai diproses.</li>
                    </ul>
                </div>

                <div>
                    <strong>Kategori</strong>
                    <p style="margin-top:4px">
                        Memfilter aspirasi berdasarkan kategori laporan atau jenis aspirasi yang dipilih siswa.
                    </p>
                </div>

                <div>
                    <strong>Siswa</strong>
                    <p style="margin-top:4px">
                        Menampilkan aspirasi yang dibuat oleh siswa tertentu.
                    </p>
                </div>

                <div>
                    <strong>Tanggal Dibuat</strong>
                    <p style="margin-top:4px">
                        Menampilkan aspirasi yang dibuat tepat pada tanggal yang dipilih.
                    </p>
                </div>

                <div>
                    <strong>Tanggal Kejadian</strong>
                    <p style="margin-top:4px">
                        Menampilkan aspirasi berdasarkan tanggal kejadian yang dilaporkan siswa.
                    </p>
                </div>

            </div>

            <p style="font-size:11px;color:#6b7280;margin-top:12px">
                Filter dapat digunakan secara bersamaan untuk mendapatkan hasil pencarian yang lebih spesifik.
            </p>

        </div>

    </x-filament::section>

</x-filament-widgets::widget>
