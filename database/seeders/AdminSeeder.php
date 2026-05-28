<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();
        $villageId = DB::table('villages')->where('name', 'DUNGUS CARIANG')->value('id');

        $users = [
            [
                'name' => 'Petugas Kelurahan',
                'email' => 'kelurahan@dunguscariang.id',
                'password' => Hash::make('Kelurahan123'),
                'role' => 'kelurahan',
                'rt_number' => null,
                'rw_number' => null,
                'village_id' => $villageId,
            ],
            [
                'name' => 'Ketua RW 01',
                'email' => 'rw01@dunguscariang.id',
                'password' => Hash::make('Rw01pass123'),
                'role' => 'rw',
                'rt_number' => null,
                'rw_number' => '01',
                'village_id' => $villageId,
            ],
            [
                'name' => 'Ketua RT 01 RW 01',
                'email' => 'rt01rw01@dunguscariang.id',
                'password' => Hash::make('Rt01pass123'),
                'role' => 'rt',
                'rt_number' => '01',
                'rw_number' => '01',
                'village_id' => $villageId,
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                array_merge($user, [
                    'remember_token' => Str::random(10),
                    'created_at' => $now,
                    'updated_at' => $now,
                ])
            );
        }
    }
}
