<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        $admin = User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'nis' => null,
            'kelas' => null,
        ]);

        $admin->assignRole('admin');


        // SISWA 1
        $siswa1 = User::create([
            'name' => 'Diah Permata',
            'email' => 'diah@gmail.com',
            'password' => Hash::make('password'),
            'nis' => '12345',
            'kelas' => 'XII RPL 1',
        ]);

        $siswa1->assignRole('siswa');


        // SISWA 2
        $siswa2 = User::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@gmail.com',
            'password' => Hash::make('password'),
            'nis' => '12346',
            'kelas' => 'XII RPL 2',
        ]);

        $siswa2->assignRole('siswa');
    }
}
