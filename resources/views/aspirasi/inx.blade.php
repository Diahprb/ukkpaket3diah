@extends('layouts::app')
@section('content')
  <!-- ===== BERANDA ===== -->
  <div id="page-beranda">
    <div class="max-w-2xl mx-auto px-6 py-8">

      <!-- Hero -->
      <div class="rounded-2xl p-7 mb-7 relative overflow-hidden border border-sky/20" style="background:linear-gradient(135deg,rgba(27,79,216,.35),rgba(14,165,233,.18))">
        <div class="absolute right-6 top-1/2 -translate-y-1/2 text-[72px] opacity-[.1] pointer-events-none">🎓</div>
        <div class="text-[13px] text-sky font-bold mb-1.5">Rabu, 4 Desember 2025</div>
        <div class="font-display font-extrabold text-[24px] mb-1.5">Selamat datang, Rizal! 👋</div>
        <div class="text-[13.5px] text-white/60 mb-4">Suarakan aspirasimu untuk sekolah yang lebih baik.</div>
        <label for="tab-form" class="px-5 py-2.5 rounded-xl text-[13px] font-bold inline-flex items-center gap-2 cursor-pointer transition-all hover:opacity-90 hover:-translate-y-0.5" style="background:linear-gradient(135deg,#1B4FD8,#0EA5E9);box-shadow:0 4px 20px rgba(27,79,216,.4)">
          📝 Buat Aspirasi Baru
        </label>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-4 gap-3.5 mb-7">
        <!-- Total -->
        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-sky/20" style="background:rgba(56,189,248,.1)">
          <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:linear-gradient(90deg,#1B4FD8,#38BDF8)"></div>
          <div class="font-display font-extrabold text-[28px] text-sky">4</div>
          <div class="text-[12px] text-slate-400">Total Aspirasi</div>
        </div>
        <!-- Diproses -->
        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-amber-400/20" style="background:rgba(245,158,11,.1)">
          <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#F59E0B"></div>
          <div class="font-display font-extrabold text-[28px] text-amber-400">2</div>
          <div class="text-[12px] text-slate-400">Diproses</div>
        </div>
        <!-- Selesai -->
        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-emerald-500/20" style="background:rgba(16,185,129,.1)">
          <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#10B981"></div>
          <div class="font-display font-extrabold text-[28px] text-emerald-400">2</div>
          <div class="text-[12px] text-slate-400">Selesai</div>
        </div>
        <!-- Balasan -->
        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-violet-400/20" style="background:rgba(139,92,246,.1)">
          <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#8B5CF6"></div>
          <div class="font-display font-extrabold text-[28px] text-violet-300">3</div>
          <div class="text-[12px] text-slate-400">Balasan</div>
        </div>
      </div>

      <!-- Aspirasi Terbaru -->
      <div class="flex items-center justify-between mb-4">
        <div>
          <div class="font-display font-extrabold text-[17px]">Aspirasi Terbaru</div>
          <div class="text-[12px] text-slate-400 mt-0.5">2 sedang dalam proses</div>
        </div>
        <label for="tab-histori" class="text-[12.5px] text-sky font-semibold cursor-pointer">Lihat Semua →</label>
      </div>

      <!-- Card 1 -->
      <div class="space-y-3.5">
        <div class="card-hover rounded-2xl p-5 border border-white/[.07]" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-048</div>
              <div class="text-[15px] font-bold mt-0.5">Proyektor kelas XI IPA 2 rusak total</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 2 Des 2025 &nbsp;·&nbsp; 🏷 Sarana Prasarana</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-amber-400 flex-shrink-0" style="background:rgba(245,158,11,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400 dot-blink inline-block"></span>Diproses
            </span>
          </div>
          <div class="text-[13px] text-white/60 leading-relaxed mb-3 line-clamp-2">Proyektor tidak berfungsi sejak 2 minggu lalu. Sangat mengganggu kegiatan belajar dengan presentasi.</div>
          <div class="prog-track">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-brand text-white" style="box-shadow:0 0 0 4px rgba(27,79,216,.3)">3</div><div class="text-[9px] text-white font-semibold text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">4</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 mt-3 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
            <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Admin Sarana · 3 Des 2025, 09.15 WIB</div>
            <div class="text-[13px] text-white/75 line-clamp-2">Tim teknisi sedang melakukan pengecekan proyektor. Estimasi penggantian komponen 2-3 hari kerja.</div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="card-hover rounded-2xl p-5 border border-white/[.07]" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-047</div>
              <div class="text-[15px] font-bold mt-0.5">Toilet lantai 2 mengalami kebocoran pipa</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 1 Des 2025 &nbsp;·&nbsp; 🏷 Fasilitas Sekolah</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-amber-400 flex-shrink-0" style="background:rgba(245,158,11,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400 dot-blink inline-block"></span>Diproses
            </span>
          </div>
          <div class="text-[13px] text-white/60 leading-relaxed mb-3 line-clamp-2">Air menggenang di lantai kamar mandi, berpotensi menyebabkan kecelakaan siswa.</div>
          <div class="prog-track">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-brand text-white" style="box-shadow:0 0 0 4px rgba(27,79,216,.3)">2</div><div class="text-[9px] text-white font-semibold text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">3</div><div class="text-[9px] text-slate-400 text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">4</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3 mt-3 border border-amber-400/20 text-[12px] text-amber-400/80 font-medium" style="background:rgba(245,158,11,.06)">⏳ Menunggu umpan balik dari admin</div>
        </div>

        <!-- Card 3 -->
        <div class="card-hover rounded-2xl p-5 border border-white/[.07]" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-046</div>
              <div class="text-[15px] font-bold mt-0.5">Lampu koridor depan aula padam</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 30 Nov 2025 &nbsp;·&nbsp; 🏷 Fasilitas Sekolah</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-emerald-400 flex-shrink-0" style="background:rgba(16,185,129,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>Selesai
            </span>
          </div>
          <div class="text-[13px] text-white/60 leading-relaxed mb-3 line-clamp-2">Lampu koridor tidak menyala sejak seminggu lalu, berbahaya saat ekskul malam.</div>
          <div class="prog-track">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 mt-3 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
            <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Admin Sarana · 1 Des 2025, 14.30 WIB</div>
            <div class="text-[13px] text-white/75 line-clamp-2">Lampu koridor telah berhasil diperbaiki. Semua 12 titik lampu sudah berfungsi normal. Terima kasih!</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ===== HISTORI ===== -->
  {{-- <div id="page-histori">
    <div class="max-w-3xl mx-auto px-6 py-8">
      <div class="mb-6">
        <div class="font-display font-extrabold text-[22px]">Histori Aspirasi 🕐</div>
        <div class="text-[13.5px] text-slate-400 mt-1">Semua aspirasi yang pernah kamu ajukan</div>
      </div>

      <!-- Stats -->
      <div class="grid grid-cols-4 gap-3.5 mb-6">
        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-sky/20" style="background:rgba(56,189,248,.1)">
          <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:linear-gradient(90deg,#1B4FD8,#38BDF8)"></div>
          <div class="font-display font-extrabold text-[28px] text-sky">4</div>
          <div class="text-[12px] text-slate-400">Total</div>
        </div>
        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-emerald-500/20" style="background:rgba(16,185,129,.1)">
          <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#10B981"></div>
          <div class="font-display font-extrabold text-[28px] text-emerald-400">2</div>
          <div class="text-[12px] text-slate-400">Selesai</div>
        </div>
        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-amber-400/20" style="background:rgba(245,158,11,.1)">
          <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#F59E0B"></div>
          <div class="font-display font-extrabold text-[28px] text-amber-400">2</div>
          <div class="text-[12px] text-slate-400">Diproses</div>
        </div>
        <div class="rounded-2xl p-[18px] text-center relative overflow-hidden border border-violet-400/20" style="background:rgba(139,92,246,.1)">
          <div class="absolute top-0 inset-x-0 h-[3px] rounded-t-2xl" style="background:#8B5CF6"></div>
          <div class="font-display font-extrabold text-[28px] text-violet-300">50%</div>
          <div class="text-[12px] text-slate-400">Tingkat Selesai</div>
        </div>
      </div>

      <!-- Filter pills (CSS-only via checkboxes would be very complex; rendered as visual only) -->
      <div class="flex gap-2 flex-wrap mb-5">
        <span class="px-3.5 py-2 rounded-xl text-[12.5px] font-semibold border text-sky border-sky/50 cursor-pointer" style="background:rgba(56,189,248,.12)">Semua</span>
        <span class="px-3.5 py-2 rounded-xl text-[12.5px] font-semibold border text-slate-400 border-white/10 cursor-pointer hover:text-white" style="background:rgba(255,255,255,.05)">Baru</span>
        <span class="px-3.5 py-2 rounded-xl text-[12.5px] font-semibold border text-slate-400 border-white/10 cursor-pointer hover:text-white" style="background:rgba(255,255,255,.05)">Diproses</span>
        <span class="px-3.5 py-2 rounded-xl text-[12.5px] font-semibold border text-slate-400 border-white/10 cursor-pointer hover:text-white" style="background:rgba(255,255,255,.05)">Selesai</span>
      </div>

      <!-- All Cards -->
      <div class="space-y-3.5">

        <!-- ASP-048 -->
        <div class="card-hover rounded-2xl p-5 border border-white/[.07]" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-048</div>
              <div class="text-[15px] font-bold mt-0.5">Proyektor kelas XI IPA 2 rusak total</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 2 Des 2025 &nbsp;·&nbsp; 🏷 Sarana Prasarana</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-amber-400 flex-shrink-0" style="background:rgba(245,158,11,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400 dot-blink inline-block"></span>Diproses
            </span>
          </div>
          <div class="text-[13px] text-white/60 leading-relaxed mb-3 line-clamp-2">Proyektor tidak berfungsi sejak 2 minggu lalu. Sangat mengganggu kegiatan belajar dengan presentasi.</div>
          <div class="prog-track">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-brand text-white" style="box-shadow:0 0 0 4px rgba(27,79,216,.3)">3</div><div class="text-[9px] text-white font-semibold text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">4</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 mt-3 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
            <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Admin Sarana · 3 Des 2025, 09.15 WIB</div>
            <div class="text-[13px] text-white/75 line-clamp-2">Tim teknisi sedang melakukan pengecekan proyektor. Estimasi penggantian komponen 2-3 hari kerja.</div>
          </div>
        </div>

        <!-- ASP-047 -->
        <div class="card-hover rounded-2xl p-5 border border-white/[.07]" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-047</div>
              <div class="text-[15px] font-bold mt-0.5">Toilet lantai 2 mengalami kebocoran pipa</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 1 Des 2025 &nbsp;·&nbsp; 🏷 Fasilitas Sekolah</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-amber-400 flex-shrink-0" style="background:rgba(245,158,11,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400 dot-blink inline-block"></span>Diproses
            </span>
          </div>
          <div class="text-[13px] text-white/60 leading-relaxed mb-3 line-clamp-2">Air menggenang di lantai kamar mandi, berpotensi menyebabkan kecelakaan siswa.</div>
          <div class="prog-track">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-brand text-white" style="box-shadow:0 0 0 4px rgba(27,79,216,.3)">2</div><div class="text-[9px] text-white font-semibold text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">3</div><div class="text-[9px] text-slate-400 text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">4</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3 mt-3 border border-amber-400/20 text-[12px] text-amber-400/80 font-medium" style="background:rgba(245,158,11,.06)">⏳ Menunggu umpan balik dari admin</div>
        </div>

        <!-- ASP-046 -->
        <div class="card-hover rounded-2xl p-5 border border-white/[.07]" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-046</div>
              <div class="text-[15px] font-bold mt-0.5">Lampu koridor depan aula padam</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 30 Nov 2025 &nbsp;·&nbsp; 🏷 Fasilitas Sekolah</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-emerald-400 flex-shrink-0" style="background:rgba(16,185,129,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>Selesai
            </span>
          </div>
          <div class="text-[13px] text-white/60 leading-relaxed mb-3 line-clamp-2">Lampu koridor tidak menyala sejak seminggu lalu, berbahaya saat ekskul malam.</div>
          <div class="prog-track">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 mt-3 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
            <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Admin Sarana · 1 Des 2025, 14.30 WIB</div>
            <div class="text-[13px] text-white/75">Lampu koridor telah berhasil diperbaiki. Semua 12 titik lampu sudah berfungsi normal. Terima kasih!</div>
          </div>
        </div>

        <!-- ASP-039 -->
        <div class="card-hover rounded-2xl p-5 border border-white/[.07]" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-039</div>
              <div class="text-[15px] font-bold mt-0.5">Kipas angin kelas mati</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 10 Nov 2025 &nbsp;·&nbsp; 🏷 Sarana Prasarana</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-emerald-400 flex-shrink-0" style="background:rgba(16,185,129,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>Selesai
            </span>
          </div>
          <div class="text-[13px] text-white/60 leading-relaxed mb-3 line-clamp-2">Kipas angin tidak menyala sama sekali, kelas menjadi panas dan tidak kondusif.</div>
          <div class="prog-track">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 mt-3 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
            <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Admin Sarana · 12 Nov 2025, 08.00 WIB</div>
            <div class="text-[13px] text-white/75">Kipas angin telah diganti dengan unit baru. Sudah berfungsi normal.</div>
          </div>
        </div>

      </div>
    </div>
  </div> --}}

  <!-- ===== UMPAN BALIK ===== -->
  {{-- <div id="page-umpan">
    <div class="max-w-2xl mx-auto px-6 py-8">
      <div class="mb-6">
        <div class="font-display font-extrabold text-[22px]">Umpan Balik 💬</div>
        <div class="text-[13.5px] text-slate-400 mt-1">Balasan dari admin atas aspirasimu</div>
      </div>

      <!-- Notif -->
      <div class="flex items-center gap-3 p-4 rounded-2xl mb-6 border border-sky/20" style="background:rgba(56,189,248,.08)">
        <span class="text-xl">🔔</span>
        <div>
          <div class="text-[13px] font-bold">3 aspirasi mendapat balasan</div>
          <div class="text-[12px] text-slate-400">Terakhir: 3 Des 2025, 09.15 WIB</div>
        </div>
      </div>

      <div class="space-y-3.5">

        <!-- With feedback -->
        <div class="card-hover rounded-2xl p-5 border border-sky/20 cursor-pointer" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-048</div>
              <div class="text-[15px] font-bold mt-0.5">Proyektor kelas XI IPA 2 rusak total</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 2 Des 2025</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-amber-400 flex-shrink-0" style="background:rgba(245,158,11,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400 dot-blink inline-block"></span>Diproses
            </span>
          </div>
          <div class="prog-track my-4">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-brand text-white" style="box-shadow:0 0 0 4px rgba(27,79,216,.3)">3</div><div class="text-[9px] text-white font-semibold text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">4</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
            <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Admin Sarana · 3 Des 2025, 09.15 WIB</div>
            <div class="text-[13px] text-white/75">Tim teknisi sedang melakukan pengecekan proyektor. Estimasi penggantian komponen 2-3 hari kerja.</div>
          </div>
        </div>

        <!-- No feedback -->
        <div class="card-hover rounded-2xl p-5 border border-white/[.07] cursor-pointer" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-047</div>
              <div class="text-[15px] font-bold mt-0.5">Toilet lantai 2 mengalami kebocoran pipa</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 1 Des 2025</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-amber-400 flex-shrink-0" style="background:rgba(245,158,11,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-amber-400 dot-blink inline-block"></span>Diproses
            </span>
          </div>
          <div class="prog-track my-4">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-brand text-white" style="box-shadow:0 0 0 4px rgba(27,79,216,.3)">2</div><div class="text-[9px] text-white font-semibold text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">3</div><div class="text-[9px] text-slate-400 text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold text-slate-400" style="background:rgba(255,255,255,.08)">4</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 border border-amber-400/20" style="background:rgba(245,158,11,.07)">
            <div class="text-[11px] text-amber-400 font-bold mb-1">⏳ Belum Ada Umpan Balik</div>
            <div class="text-[13px] text-white/70">Aspirasi sedang dalam tahap peninjauan.</div>
          </div>
        </div>

        <!-- Selesai with feedback -->
        <div class="card-hover rounded-2xl p-5 border border-sky/20 cursor-pointer" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-046</div>
              <div class="text-[15px] font-bold mt-0.5">Lampu koridor depan aula padam</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 30 Nov 2025</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-emerald-400 flex-shrink-0" style="background:rgba(16,185,129,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>Selesai
            </span>
          </div>
          <div class="prog-track my-4">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
            <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Admin Sarana · 1 Des 2025, 14.30 WIB</div>
            <div class="text-[13px] text-white/75">Lampu koridor telah berhasil diperbaiki. Semua 12 titik lampu sudah berfungsi normal. Terima kasih atas laporanmu!</div>
          </div>
        </div>

        <!-- ASP-039 with feedback -->
        <div class="card-hover rounded-2xl p-5 border border-sky/20 cursor-pointer" style="background:rgba(255,255,255,.04)">
          <div class="flex items-start justify-between mb-2">
            <div>
              <div class="text-[11px] text-sky font-bold">#ASP-039</div>
              <div class="text-[15px] font-bold mt-0.5">Kipas angin kelas mati</div>
              <div class="text-[12px] text-slate-400 mt-1">📅 10 Nov 2025</div>
            </div>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold text-emerald-400 flex-shrink-0" style="background:rgba(16,185,129,.15)">
              <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 inline-block"></span>Selesai
            </span>
          </div>
          <div class="prog-track my-4">
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Diterima</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Ditinjau</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Perbaikan</div></div>
            <div class="prog-step"><div class="w-7 h-7 rounded-full flex items-center justify-center text-[11px] font-bold bg-emerald-400 text-white">✓</div><div class="text-[9px] text-slate-400 text-center mt-1">Selesai</div></div>
          </div>
          <div class="rounded-xl p-3.5 border border-emerald-500/20" style="background:rgba(16,185,129,.07)">
            <div class="text-[11px] text-emerald-400 font-bold mb-1">💬 Admin Sarana · 12 Nov 2025, 08.00 WIB</div>
            <div class="text-[13px] text-white/75">Kipas angin telah diganti dengan unit baru. Sudah berfungsi normal.</div>
          </div>
        </div>

      </div>
    </div>
  </div> --}}
@endsection
