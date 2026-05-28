<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Rename kolom longtitude → longitude di tabel surveis
     * dan ubah foto_ktp, foto_rumah, foto_rumah_dalam menjadi nullable
     * (untuk mendukung perpindahan penyimpanan ke disk private).
     */
    public function up(): void
    {
        Schema::table('surveis', function (Blueprint $table) {
            // [FIX] Rename typo: longtitude → longitude
            if (Schema::hasColumn('surveis', 'longtitude')) {
                $table->renameColumn('longtitude', 'longitude');
            }

            // [FIX] Buat kolom foto nullable agar update tidak wajib re-upload
            $table->string('foto_ktp')->nullable()->change();
            $table->string('foto_rumah')->nullable()->change();
            $table->string('foto_rumah_dalam')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('surveis', function (Blueprint $table) {
            if (Schema::hasColumn('surveis', 'longitude')) {
                $table->renameColumn('longitude', 'longtitude');
            }

            $table->string('foto_ktp')->nullable(false)->change();
            $table->string('foto_rumah')->nullable(false)->change();
            $table->string('foto_rumah_dalam')->nullable(false)->change();
        });
    }
};
