<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class AspirasiSeeder extends Seeder
{
    public function run(): void
    {
        $siswa = User::role('siswa')->get();
        $kategoris = Kategori::all();

        foreach ($siswa as $user) {
            Aspirasi::create([
                // 'siswa_id' => $user->id,
                'kategori_id' => $kategoris->random()->id,
                'judul' => 'Perbaikan AC Kelas',
                'keterangan' => 'AC di kelas kami tidak berfungsi dengan baik.',
                'status' => 'menunggu',
                'feedback' => null,
            ]);
        }
    }
}
