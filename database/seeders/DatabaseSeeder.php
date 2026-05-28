<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Data wilayah harus masuk lebih dulu karena user RT/RW/Kelurahan memakai FK village_id.
        $this->call([
            IndoRegionSeeder::class,
            AdminSeeder::class,
        ]);
    }
}
