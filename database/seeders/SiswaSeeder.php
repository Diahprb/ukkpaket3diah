<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    public function run()
    {
        Siswa::updateOrCreate([
            'email' => 'siswa@example.com',
        ], [
            'name' => 'Sample Siswa',
            'password' => Hash::make('password'),
            'nis' => '123456',
            'kelas' => 'XI-A',
        ]);
    }
}
