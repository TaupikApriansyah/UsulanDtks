<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SurveiSeeder extends Seeder
{
    /**
     * Seeder ini sengaja dikosongkan.
     *
     * Data survei/usulan bersifat sensitif (foto KTP, foto rumah, NIK)
     * sehingga tidak di-seed secara otomatis.
     *
     * [FIX] Kolom lama yang digunakan sebelumnya (email, tlp, survei, kota)
     * tidak ada di tabel surveis — seeder sebelumnya akan crash saat dijalankan.
     *
     * Untuk pengujian, login sebagai RT lalu buat data melalui menu Usulan DTKS atau halaman /plus.
     */
    public function run(): void
    {
        // intentionally empty
    }
}
